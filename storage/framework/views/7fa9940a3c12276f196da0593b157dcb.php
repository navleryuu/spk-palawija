

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Tambah User</h1>

    
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

    
    <form action="<?php echo e(route('admin.users.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" class="w-full border rounded-xl p-2 mt-1" placeholder="Nama lengkap" required>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">NIP</label>
            <input type="text" name="nip" class="w-full border rounded-xl p-2 mt-1" placeholder="Masukkan NIP" required>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Role</label>
            <select name="role" class="w-full border rounded-xl p-2 mt-1" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="kepala_dinas">Kepala Dinas</option>
            </select>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Password</label>
            <input type="password" name="password" class="w-full border rounded-xl p-2 mt-1" placeholder="Minimal 6 karakter" required>
        </div>

        
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

        
        <div>
            <label class="font-semibold text-gray-700">Jawaban Keamanan</label>
            <input type="text" name="security_answer" class="w-full border rounded-xl p-2 mt-1" placeholder="Masukkan jawaban rahasia" required>
        </div>

        
        <div class="flex justify-end gap-3 mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/user/create.blade.php ENDPATH**/ ?>