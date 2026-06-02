@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Tambah Alternatif Benih Palawija</h1>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Pesan SweetAlert --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#16a34a',
                    background: '#f0fdf4',
                    color: '#166534',
                    iconColor: '#16a34a'
                });
            });
        </script>
    @endif

    <form action="{{ route('alternatif.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Kode Alternatif --}}
        <div>
            <label class="font-semibold text-gray-700">Kode Alternatif</label>
            <input type="text" name="code" class="w-full border rounded-xl p-2 mt-1" placeholder="Misal: A1" required>
        </div>

        {{-- Nama Alternatif --}}
        <div>
            <label class="font-semibold text-gray-700">Nama Alternatif</label>
            <input type="text" name="nama" class="w-full border rounded-xl p-2 mt-1" placeholder="Nama benih palawija" required>
        </div>

        {{-- Tahun --}}
        <div>
            <label class="font-semibold text-gray-700">Tahun</label>
            <input type="number" name="tahun" class="w-full border rounded-xl p-2 mt-1" placeholder="Contoh: 2025">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="font-semibold text-gray-700">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="3" class="w-full border rounded-xl p-2 mt-1" placeholder="Keterangan atau ciri benih..."></textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>
            <a href="{{ route('alternatif.index') }}" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
