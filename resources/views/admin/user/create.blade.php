@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Tambah User</h1>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Pesan sukses --}}
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

    {{-- Form Tambah User --}}
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Baris 1: Nama --}}
        <div>
            <label class="font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" class="w-full border rounded-xl p-2 mt-1" placeholder="Nama lengkap" required>
        </div>

        {{-- Baris 2: NIP --}}
        <div>
            <label class="font-semibold text-gray-700">NIP</label>
            <input type="text" name="nip" class="w-full border rounded-xl p-2 mt-1" placeholder="Masukkan NIP" required>
        </div>

        {{-- Baris 3: Role --}}
        <div>
            <label class="font-semibold text-gray-700">Role</label>
            <select name="role" class="w-full border rounded-xl p-2 mt-1" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="kepala_dinas">Kepala Dinas</option>
            </select>
        </div>

        {{-- Baris 4: Password --}}
        <div>
            <label class="font-semibold text-gray-700">Password</label>
            <input type="password" name="password" class="w-full border rounded-xl p-2 mt-1" placeholder="Minimal 6 karakter" required>
        </div>

        {{-- Baris 5: Pertanyaan Keamanan --}}
        <div>
            <label class="font-semibold text-gray-700">Pertanyaan Keamanan</label>
            <select name="security_question" class="w-full border rounded-xl p-2 mt-1" required>
                <option value="" disabled selected>Pilih Pertanyaan</option>
                <option value="Apa nama ibu kandung Anda?">Apa nama ibu kandung Anda?</option>
                <option value="Di kota apa Anda lahir?">Di kota apa Anda lahir?</option>
                <option value="Siapa guru favorit Anda di SD?">Siapa guru favorit Anda di SD?</option>
                <option value="Apa makanan favorit Anda?">Apa makanan favorit Anda?</option>
                <option value="Apa hobi yang paling Anda sukai?">Apa hobi yang paling Anda sukai?</option>
            </select>
        </div>

        {{-- Baris 6: Jawaban Keamanan --}}
        <div>
            <label class="font-semibold text-gray-700">Jawaban Keamanan</label>
            <input type="text" name="security_answer" class="w-full border rounded-xl p-2 mt-1" placeholder="Masukkan jawaban rahasia" required>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-3 mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
