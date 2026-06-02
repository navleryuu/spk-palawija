@extends('admin.dashboard')

@section('title', 'Laporan Hasil Rekomendasi')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    {{-- Breadcrumb --}}
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-file-alt text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Laporan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Hasil Rekomendasi </span>
    </div>
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-green-700 mb-1">Laporan Hasil Rekomendasi</h1>
            <p class="text-gray-600 text-sm">
                Tampilan ini menunjukkan hasil rekomendasi dari sistem pendukung keputusan berdasarkan metode 
                <b>MOORA</b> dan <b>ORESTE</b>.
            </p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('laporan.cetak') }}" 
               target="_blank"
               class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Laporan --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-center">Peringkat</th>
                    <th class="p-3 border-b text-left">Alternatif</th>
                    <th class="p-3 border-b text-center">Nilai MOORA</th>
                    <th class="p-3 border-b text-center">Nilai ORESTE</th>

                </tr>
            </thead>
            <tbody>
            @forelse($laporan as $item)
            <tr class="hover:bg-green-50">
                <td class="p-3 border-b text-center font-semibold text-green-700">{{ $loop->iteration }}</td>

                <td class="p-3 border-b">
                    {{ $item->nama_alternatif }}
                </td>

                <td class="p-3 border-b text-center">
                    {{ number_format($item->skor_moora ?? 0, 4) }}
                </td>

                <td class="p-3 border-b text-center font-semibold text-green-700">
                    {{ number_format($item->total_oreste ?? 0, 4) }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">Belum ada hasil perhitungan yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>


        </table>
    </div>

    {{-- Keterangan --}}
    <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-gray-700">
        <p><b>Keterangan:</b></p>
        <ul class="list-disc ml-6 mt-1 space-y-1">
            <li><b>Ranking MOORA</b> menunjukkan urutan alternatif berdasarkan hasil metode MOORA.</li>
            <li><b>Nilai ORESTE</b> adalah hasil perangkingan preferensi antar alternatif sebagai dasar rekomendasi akhir.</li>

        </ul>
    </div>
</div>
@endsection

@section('scripts')
{{-- Font Awesome & SweetAlert --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Pesan Sukses Cetak --}}
@if(session('printed'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Laporan Dicetak',
        text: '{{ session('printed') }}',
        confirmButtonColor: '#16a34a'
    });
</script>
@endif
@endsection
