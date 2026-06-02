

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow w-full max-w-7xl ml-10">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Alternatif Benih Palawija</h1>

    <form action="<?php echo e(route('alternatif.update', $alternatif->id)); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="font-semibold text-gray-700">Kode Alternatif</label>
                <input type="text" name="code" value="<?php echo e($alternatif->code); ?>"
                       class="w-full border rounded-xl p-3" placeholder="Misal: A1">
            </div>

            <div>
                <label class="font-semibold text-gray-700">Nama Alternatif</label>
                <input type="text" name="nama" value="<?php echo e($alternatif->nama); ?>"
                       class="w-full border rounded-xl p-3" placeholder="Nama benih palawija">
            </div>
        </div>

        <div>
            <label class="font-semibold text-gray-700">Tahun</label>
            <input type="number" name="tahun" value="<?php echo e($alternatif->tahun); ?>"
                   class="w-full border rounded-xl p-3" placeholder="Contoh: 2025">
        </div>

        <div>
            <label class="font-semibold text-gray-700">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border rounded-xl p-3"
                      placeholder="Keterangan atau ciri benih..."><?php echo e($alternatif->deskripsi); ?></textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <button type="submit"
                    class="px-5 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan
            </button>

            <a href="<?php echo e(route('alternatif.index')); ?>"
               class="px-5 py-2 bg-gray-300 rounded-xl hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/alternatif/edit.blade.php ENDPATH**/ ?>