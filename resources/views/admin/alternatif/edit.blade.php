@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow w-full max-w-7xl ml-10">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Alternatif Benih Palawija</h1>

    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="font-semibold text-gray-700">Kode Alternatif</label>
                <input type="text" name="code" value="{{ $alternatif->code }}"
                       class="w-full border rounded-xl p-3" placeholder="Misal: A1">
            </div>

            <div>
                <label class="font-semibold text-gray-700">Nama Alternatif</label>
                <input type="text" name="nama" value="{{ $alternatif->nama }}"
                       class="w-full border rounded-xl p-3" placeholder="Nama benih palawija">
            </div>
        </div>

        <div>
            <label class="font-semibold text-gray-700">Tahun</label>
            <input type="number" name="tahun" value="{{ $alternatif->tahun }}"
                   class="w-full border rounded-xl p-3" placeholder="Contoh: 2025">
        </div>

        <div>
            <label class="font-semibold text-gray-700">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border rounded-xl p-3"
                      placeholder="Keterangan atau ciri benih...">{{ $alternatif->deskripsi }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>

            <a href="{{ route('alternatif.index') }}"
               class="px-5 py-2 bg-gray-300 rounded-xl hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
