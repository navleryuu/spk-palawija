@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow relative">
    {{-- Breadcrumb --}}
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-trophy text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Perangkingan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Perangkingan ORESTE </span>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700">Perangkingan ORESTE </h1>
    </div>

    @if($message)
        <div class="p-4 mb-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded">
            {{ $message }}
        </div>
    @endif

    <div class="space-y-3">

        {{-- STEP 1 – Matriks Preferensi --}}
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(1)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">1. Matriks Preferensi Antar Alternatif</span>
                <i id="icon-1" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-1" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b text-center">Alternatif</th>
                            @foreach($ranking as $alt)
                                <th class="p-3 border-b text-center">
                                    ({{ strtoupper($alt->alternatif->code ?? 'A?') }}) {{ $alt->alternatif->nama }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking as $a1)
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700">
                                    ({{ strtoupper($a1->alternatif->code ?? 'A?') }}) {{ $a1->alternatif->nama }}
                                </td>
                                @foreach($ranking as $a2)
                                    <td class="p-3 border-b text-center">
                                        {{ $preferensi[$a1->alternatif->nama][$a2->alternatif->nama] ?? 0 }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- STEP 2 – Total Preferensi --}}
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(2)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">2. Total Preferensi Tiap Alternatif</span>
                <i id="icon-2" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-2" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Total Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalPreferensi as $altName => $total)
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700">{{ $altName }}</td>
                                <td class="p-3 border-b text-center">{{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       {{-- STEP 3 – Normalisasi --}}
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(3)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">3. Normalisasi Nilai Preferensi (Skor ORESTE)</span>
                <i id="icon-3" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-3" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Skor Normalisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasil_oreste as $h)
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700">
                                   {{ $h['alternatif'] }}
                                </td>
                                <td class="p-3 border-b text-center">{{ $h['skor'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- STEP 4 – Ranking Akhir --}}
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(4)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">4. Hasil Akhir dan Peringkat ORESTE</span>
                <i id="icon-4" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-4" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b text-center">Peringkat</th>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Skor ORESTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasil_oreste as $h)
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold">{{ $h['no'] }}</td>
                                <td class="p-3 border-b text-center"> {{ $h['alternatif'] }}</td>
                                <td class="p-3 border-b text-center">{{ $h['skor'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
function toggleStep(step) {
    const content = document.getElementById(`step-${step}`);
    const icon = document.getElementById(`icon-${step}`);

    if (content.classList.contains('hidden')) {
        document.querySelectorAll('[id^="step-"]').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('[id^="icon-"]').forEach(ic => ic.classList.replace('fa-chevron-up', 'fa-chevron-down'));

        content.classList.remove('hidden');
        icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
    } else {
        content.classList.add('hidden');
        icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
    }
}
</script>
@endsection
