

<?php $__env->startSection('title', 'Manajemen User'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-users-cog text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">User</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Manajemen User</span>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-green-700">Daftar User</h1>
        <a href="<?php echo e(route('admin.users.create')); ?>" 
           class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-2">
            <i class="fas fa-user-plus"></i> Tambah User
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
                    <th class="p-3 border-b text-left">Nama</th>
                    <th class="p-3 border-b text-left">NIP</th>
                    <th class="p-3 border-b text-center">Role</th>
                    <th class="p-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-green-50 transition">
                        <td class="p-3 border-b text-gray-700"><?php echo e($user->name); ?></td>
                        <td class="p-3 border-b text-gray-700"><?php echo e($user->nip); ?></td>
                        <td class="p-3 border-b text-center">
                            <?php
                                $role = ucfirst($user->role);
                                $color = $role === 'Admin' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700';
                            ?>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo e($color); ?>">
                                <?php echo e($role); ?>

                            </span>
                        </td>
                        <td class="p-3 border-b text-center">
                            <div class="flex justify-center gap-2">
                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" 
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500 flex items-center gap-1 text-xs">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button"
                                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center gap-1 text-xs delete-btn"
                                        data-name="<?php echo e($user->name); ?>" data-id="<?php echo e($user->id); ?>">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada user terdaftar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const userId = this.dataset.id;
            const userName = this.dataset.name;

            Swal.fire({
                title: 'Hapus User?',
                text: `Data '${userName}' akan dihapus secara permanen.`,
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
                    form.action = `<?php echo e(url('admin/users')); ?>/${userId}`;
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

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/user/index.blade.php ENDPATH**/ ?>