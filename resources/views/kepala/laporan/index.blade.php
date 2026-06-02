@extends('kepala.dashboard')

@section('title', 'Laporan Kepala Dinas')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    {{-- Breadcrumb --}}
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-file-alt text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Laporan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Hasil Rekomendasi</span>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-green-700">Laporan Hasil Rekomendasi</h1>
        <a href="{{ route('kepala.laporan.cetak') }}" 
           class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-2">
            <i class="fas fa-print"></i> Cetak PDF
        </a>
    </div>

    {{-- Tabel Laporan --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-center">Peringkat</th>
                    <th class="p-3 border-b text-left">Nama Alternatif</th>
                    <th class="p-3 border-b text-center">Nilai MOORA</th>
                    <th class="p-3 border-b text-center">Nilai ORESTE</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $index => $item)
                    <tr class="hover:bg-green-50 transition">
                        <td class="p-3 border-b text-center font-semibold text-gray-700">
                            {{ $index + 1 }}
                        </td>
                        <td class="p-3 border-b text-gray-700">
                            {{ $item->alternatif }}
                        </td>
                        <td class="p-3 border-b text-center text-gray-700">
                            {{ number_format($item->skor_moora, 4) }}
                        </td>
                        <td class="p-3 border-b text-center text-gray-700">
                            {{ number_format($item->nilai_oreste, 4) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data laporan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
