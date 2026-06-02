

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Tambah Alternatif Benih Palawija</h1>

    
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

    <form action="<?php echo e(route('alternatif.store')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="font-semibold text-gray-700">Kode Alternatif</label>
            <input type="text" name="code" class="w-full border rounded-xl p-2 mt-1" placeholder="Misal: A1" required>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Nama Alternatif</label>
            <input type="text" name="nama" class="w-full border rounded-xl p-2 mt-1" placeholder="Nama benih palawija" required>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Tahun</label>
            <input type="number" name="tahun" class="w-full border rounded-xl p-2 mt-1" placeholder="Contoh: 2025">
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="3" class="w-full border rounded-xl p-2 mt-1" placeholder="Keterangan atau ciri benih..."></textarea>
        </div>

        
        <div class="flex justify-end gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>
            <a href="<?php echo e(route('alternatif.index')); ?>" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/alternatif/create.blade.php ENDPATH**/ ?>