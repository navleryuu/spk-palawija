@extends('layouts.main')
@section('title', 'Dashboard Admin')

{{-- ================================
        SIDEBAR
================================ --}}
@section('sidebar')
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 p-2 bg-green-800 rounded hover:bg-green-700">
        <i class="fas fa-home"></i> <span>Dashboard</span>
    </a>

    <a href="{{ route('kriteria.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-chart-bar"></i> <span>Kriteria</span>
    </a>

    <a href="{{ route('alternatif.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-seedling"></i> <span>Alternatif</span>
    </a>

    <a href="{{ route('perhitungan.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-calculator"></i> <span>Perhitungan</span>
    </a>

    <a href="{{ route('perangkingan.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-trophy"></i> <span>Perangkingan</span>
    </a>

    <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-file-alt"></i> <span>Laporan</span>
    </a>

    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-users-cog"></i> <span>Manajemen User</span>
    </a>

    {{-- Logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-4 border-t border-green-600 pt-3">
        @csrf
        <button type="button" id="logout-btn"
            class="flex items-center gap-2 w-full text-left bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md transition">
            <i class="fas fa-power-off"></i> <span>Logout</span>
        </button>
    </form>
@endsection

@section('header', 'Dashboard Admin')

{{-- ================================
        MAIN CONTENT
================================ --}}
@section('content')

{{-- === 3 Card Statistik === --}}
<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold text-green-600 mb-2">Total Kriteria</h2>
        <p class="text-4xl font-bold text-gray-700">{{ $totalKriteria ?? 0 }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold text-green-600 mb-2">Total Alternatif</h2>
        <p class="text-4xl font-bold text-gray-700">{{ $totalAlternatif ?? 0 }}</p>
    </div>

    
</div>

{{-- === Rekomendasi Benih Terbaik === --}}
<div class="mt-6 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold text-green-600 mb-3">Rekomendasi Benih Terbaik</h2>

    @if(isset($benihTerbaik))
        <p class="text-xl font-medium text-gray-700">{{ $benihTerbaik->alternatif }}</p>
        <p class="text-gray-500 text-sm mt-1">
            Nilai Akhir: {{ number_format($benihTerbaik->nilai_oreste, 4) }}
        </p>

    @else
        <p class="text-gray-500">Belum ada hasil perhitungan.</p>
    @endif

</div>

{{-- === Grafik Ranking Alternatif === --}}
<div class="mt-6 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold text-green-600 mb-4">Grafik Ranking Alternatif</h2>

    {{-- FIX: wrapper height fixed agar tidak looping --}}
    <div class="w-full h-64">
        <canvas id="rankingChart"></canvas>
    </div>
</div>

@endsection

{{-- ================================
        SCRIPTS
================================ --}}
@section('scripts')

{{-- Font Awesome + SweetAlert --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Logout Confirmation --}}
<script>
    document.getElementById('logout-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Logout?',
            text: 'Apakah kamu yakin ingin keluar dari sistem?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#16a34a',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fas fa-power-off"></i> Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>

{{-- === Chart.js (PASTIKAN HANYA SATU) === --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('rankingChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartLabels ?? []),
            datasets: [{
                label: 'Nilai Ranking',
                data: @json($chartValues ?? []),
                backgroundColor: 'rgba(72, 187, 120, 0.5)',
                borderColor: 'rgba(34, 139, 34, 1)',
                borderWidth: 1,
                maxBarThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endsection
