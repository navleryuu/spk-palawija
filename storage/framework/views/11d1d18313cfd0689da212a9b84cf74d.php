

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Edit User</h1>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
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
                    iconColor: '#16a34a'
                });
            });
        </script>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div>
            <label class="font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="w-full border rounded-xl p-2 mt-1" required>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">NIP</label>
            <input type="text" name="nip" value="<?php echo e(old('nip', $user->nip)); ?>" class="w-full border rounded-xl p-2 mt-1" readonly>
            <p class="text-xs text-gray-500 mt-1">NIP tidak dapat diubah.</p>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Role</label>
            <select name="role" class="w-full border rounded-xl p-2 mt-1" required>
                <option value="admin" <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                <option value="kepala_dinas" <?php echo e($user->role == 'kepala_dinas' ? 'selected' : ''); ?>>Kepala Dinas</option>
            </select>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Password Baru (Opsional)</label>
            <input type="password" name="password" class="w-full border rounded-xl p-2 mt-1" placeholder="Isi jika ingin mengganti password">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
        </div>

        
        <div class="flex justify-end gap-3 mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Perbarui
            </button>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>