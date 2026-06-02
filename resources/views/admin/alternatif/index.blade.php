@extends('admin.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow">
    {{-- Breadcrumb --}}
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-seedling text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Alternatif</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Daftar Alternatif Benih</span>
    </div>

    <h1 class="text-2xl font-bold text-green-700 mb-4">Daftar Alternatif Benih Palawija</h1>

    {{-- Tombol Tambah --}}
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('alternatif.create') }}" 
           class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-1">
            <i class="fas fa-plus"></i> Tambah Alternatif
        </a>
    </div>

    {{-- Notifikasi sukses --}}
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
                    iconColor: '#16a34a',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-left">Kode</th>
                    <th class="p-3 border-b text-left">Nama Alternatif</th>
                    <th class="p-3 border-b text-left">Deskripsi</th>
                    <th class="p-3 border-b text-center">Tahun</th>
                    <th class="p-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alternatif as $a)
                <tr class="hover:bg-green-50 transition">
                    <td class="p-3 border-b">{{ $a->code }}</td>
                    <td class="p-3 border-b font-semibold text-green-700">{{ $a->nama }}</td>
                    <td class="p-3 border-b text-gray-700">{{ $a->deskripsi ?? '-' }}</td>
                    <td class="p-3 border-b text-center">{{ $a->tahun ?? '-' }}</td>
                    <td class="p-3 border-b text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('alternatif.edit', $a->id) }}" 
                               class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500 flex items-center gap-1 text-xs">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center gap-1 text-xs delete-btn"
                                    data-id="{{ $a->id }}" data-nama="{{ $a->nama }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500 italic">Belum ada data alternatif</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
{{-- Font Awesome + SweetAlert2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // SweetAlert hapus alternatif
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const nama = this.dataset.nama;

            Swal.fire({
                title: 'Hapus Alternatif?',
                text: `Data '${nama}' akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="fas fa-trash"></i> Hapus',
                cancelButtonText: 'Batal',
                background: '#f0fdf4',
                color: '#166534'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/alternatif') }}/${id}`;
                    form.style.display = 'none';

                    const csrf = document.createElement('input');
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    const method = document.createElement('input');
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
