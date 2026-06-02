@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Edit User</h1>

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

    {{-- Form Edit User --}}
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Baris 1: Nama --}}
        <div>
            <label class="font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded-xl p-2 mt-1" required>
        </div>

        {{-- Baris 2: NIP --}}
        <div>
            <label class="font-semibold text-gray-700">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $user->nip) }}" class="w-full border rounded-xl p-2 mt-1" readonly>
            <p class="text-xs text-gray-500 mt-1">NIP tidak dapat diubah.</p>
        </div>

        {{-- Baris 3: Role --}}
        <div>
            <label class="font-semibold text-gray-700">Role</label>
            <select name="role" class="w-full border rounded-xl p-2 mt-1" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kepala_dinas" {{ $user->role == 'kepala_dinas' ? 'selected' : '' }}>Kepala Dinas</option>
            </select>
        </div>

        {{-- Baris 4: Password (opsional) --}}
        <div>
            <label class="font-semibold text-gray-700">Password Baru (Opsional)</label>
            <input type="password" name="password" class="w-full border rounded-xl p-2 mt-1" placeholder="Isi jika ingin mengganti password">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-3 mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Perbarui
            </button>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
