

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Edit Kriteria & Subkriteria</h1>

    <form action="<?php echo e(route('kriteria.update', $kriteria->id)); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="font-semibold text-gray-700">Kode</label>
                <input type="text" name="kode" value="<?php echo e($kriteria->kode); ?>" class="w-full border rounded-xl p-2" required>
            </div>
            <div>
                <label class="font-semibold text-gray-700">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" value="<?php echo e($kriteria->nama_kriteria); ?>" class="w-full border rounded-xl p-2" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="font-semibold text-gray-700">Bobot</label>
                <input type="number" step="0.01" name="bobot" value="<?php echo e($kriteria->bobot); ?>" class="w-full border rounded-xl p-2" required>
            </div>
            <div>
                <label class="font-semibold text-gray-700">Tipe</label>
                <select name="tipe" class="w-full border rounded-xl p-2">
                    <option value="benefit" <?php echo e($kriteria->tipe == 'benefit' ? 'selected' : ''); ?>>Benefit</option>
                    <option value="cost" <?php echo e($kriteria->tipe == 'cost' ? 'selected' : ''); ?>>Cost</option>
                </select>
            </div>
        </div>

        
        <div>
            <label class="font-semibold text-gray-700">Subkriteria</label>
            <div id="subkriteria-wrapper" class="space-y-2">
                <?php $__currentLoopData = $kriteria->subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex gap-2">
                    <input type="text" name="subkriteria[<?php echo e($i); ?>][nama_subkriteria]" value="<?php echo e($sub->nama_subkriteria); ?>" class="w-2/3 border rounded-xl p-2" required>
                    <input type="number" step="0.01" name="subkriteria[<?php echo e($i); ?>][nilai]" value="<?php echo e($sub->nilai); ?>" class="w-1/3 border rounded-xl p-2" required>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="button" id="add-subkriteria" class="mt-2 text-green-600 font-semibold">+ Tambah Subkriteria</button>
        </div>

        <div class="flex justify-end gap-3">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                Simpan Perubahan
            </button>
            <a href="<?php echo e(route('kriteria.index')); ?>" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                Batal
            </a>
        </div>
    </form>
</div>


<script>
    let i = <?php echo e(count($kriteria->subkriteria)); ?>;
    document.getElementById('add-subkriteria').addEventListener('click', () => {
        const wrapper = document.getElementById('subkriteria-wrapper');
        const field = document.createElement('div');
        field.classList.add('flex', 'gap-2', 'mt-2');
        field.innerHTML = `
            <input type="text" name="subkriteria[${i}][nama_subkriteria]" placeholder="Nama Subkriteria" class="w-2/3 border rounded-xl p-2" required>
            <input type="number" step="0.01" name="subkriteria[${i}][nilai]" placeholder="Nilai" class="w-1/3 border rounded-xl p-2" required>
        `;
        wrapper.appendChild(field);
        i++;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/kriteria/edit.blade.php ENDPATH**/ ?>