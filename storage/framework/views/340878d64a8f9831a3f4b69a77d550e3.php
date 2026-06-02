

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-chart-bar text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Kriteria</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Daftar Kriteria & Subkriteria</span>
    </div>

    <h1 class="text-2xl font-bold text-green-700 mb-4">Daftar Kriteria & Subkriteria</h1>

    <div class="flex justify-end items-center mb-4">
        <a href="<?php echo e(route('kriteria.create')); ?>" 
           class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-1">
            <i class="fas fa-plus"></i> Tambah Kriteria
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?php echo e(session('success')); ?>',
                    confirmButtonColor: '#16a34a',
                    background: '#f0fdf4',
                    color: '#166534',
                    iconColor: '#16a34a',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-left">Kode</th>
                    <th class="p-3 border-b text-left">Nama Kriteria</th>
                    <th class="p-3 border-b text-center">Bobot</th>
                    <th class="p-3 border-b text-center">Tipe</th>
                    <th class="p-3 border-b text-left">Subkriteria</th>
                    <th class="p-3 border-b text-center">Status</th>
                    <th class="p-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-green-50 transition">
                    <td class="p-3 border-b"><?php echo e($k->kode); ?></td>
                    <td class="p-3 border-b"><?php echo e($k->nama_kriteria); ?></td>
                    <td class="p-3 border-b text-center font-medium"><?php echo e(number_format($k->bobot, 2)); ?></td>
                    <td class="p-3 border-b text-center"><?php echo e(ucfirst($k->tipe)); ?></td>
                    <td class="p-3 border-b">
                        <ul class="list-disc list-inside text-gray-700">
                            <?php $__currentLoopData = $k->subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($sub->nama_subkriteria); ?> (Nilai: <?php echo e($sub->nilai); ?>)</li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td class="p-3 border-b text-center">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                            Aktif
                        </span>
                    </td>
                    <td class="p-3 border-b text-center">
                        <div class="flex justify-center gap-2">
                            <a href="<?php echo e(route('kriteria.edit', $k->id)); ?>" 
                               class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500 flex items-center gap-1 text-xs">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center gap-1 text-xs delete-btn"
                                    data-id="<?php echo e($k->id); ?>" data-nama="<?php echo e($k->nama_kriteria); ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <span class="font-semibold text-gray-700">Total Bobot: <?php echo e(number_format($totalBobot, 2)); ?></span>
        <?php if($totalBobot == 1): ?>
            <span class="text-green-600 font-semibold flex items-center gap-1">
                <i class="fas fa-check-circle"></i> Valid
            </span>
        <?php else: ?>
            <span class="text-red-600 font-semibold flex items-center gap-1">
                <i class="fas fa-times-circle"></i> Tidak Valid
            </span>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // SweetAlert hapus kriteria
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const nama = this.dataset.nama;

            Swal.fire({
                title: 'Hapus Kriteria?',
                text: `Data '${nama}' dan subkriterianya akan dihapus secara permanen.`,
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
                    form.action = `<?php echo e(url('admin/kriteria')); ?>/${id}`;
                    form.style.display = 'none';

                    const csrf = document.createElement('input');
                    csrf.name = '_token';
                    csrf.value = '<?php echo e(csrf_token()); ?>';
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/kriteria/index.blade.php ENDPATH**/ ?>