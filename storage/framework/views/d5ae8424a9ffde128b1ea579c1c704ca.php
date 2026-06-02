

<?php $__env->startSection('title', 'Laporan Kepala Dinas'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-file-alt text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Laporan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Hasil Rekomendasi</span>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-green-700">Laporan Hasil Rekomendasi</h1>
        <a href="<?php echo e(route('kepala.laporan.cetak')); ?>" 
           class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 flex items-center gap-2">
            <i class="fas fa-print"></i> Cetak PDF
        </a>
    </div>

    
    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-center">Peringkat</th>
                    <th class="p-3 border-b text-left">Nama Alternatif</th>
                    <th class="p-3 border-b text-center">Nilai MOORA</th>
                    <th class="p-3 border-b text-center">Nilai ORESTE</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-green-50 transition">
                        <td class="p-3 border-b text-center font-semibold text-gray-700">
                            <?php echo e($index + 1); ?>

                        </td>
                        <td class="p-3 border-b text-gray-700">
                            <?php echo e($item->alternatif); ?>

                        </td>
                        <td class="p-3 border-b text-center text-gray-700">
                            <?php echo e(number_format($item->skor_moora, 4)); ?>

                        </td>
                        <td class="p-3 border-b text-center text-gray-700">
                            <?php echo e(number_format($item->nilai_oreste, 4)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data laporan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kepala.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/kepala/laporan/index.blade.php ENDPATH**/ ?>