

<?php $__env->startSection('title', 'Laporan Hasil Rekomendasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-file-alt text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Laporan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Hasil Rekomendasi </span>
    </div>
    
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-green-700 mb-1">Laporan Hasil Rekomendasi</h1>
            <p class="text-gray-600 text-sm">
                Tampilan ini menunjukkan hasil rekomendasi dari sistem pendukung keputusan berdasarkan metode 
                <b>MOORA</b> dan <b>ORESTE</b>.
            </p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="<?php echo e(route('laporan.cetak')); ?>" 
               target="_blank"
               class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
    </div>

    
    <?php if(session('success')): ?>
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg border border-green-300">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="overflow-x-auto">
        <table class="w-full border border-green-200 rounded-lg text-sm">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-3 border-b text-center">Peringkat</th>
                    <th class="p-3 border-b text-left">Alternatif</th>
                    <th class="p-3 border-b text-center">Nilai MOORA</th>
                    <th class="p-3 border-b text-center">Nilai ORESTE</th>

                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-green-50">
                <td class="p-3 border-b text-center font-semibold text-green-700"><?php echo e($loop->iteration); ?></td>

                <td class="p-3 border-b">
                    <?php echo e($item->nama_alternatif); ?>

                </td>

                <td class="p-3 border-b text-center">
                    <?php echo e(number_format($item->skor_moora ?? 0, 4)); ?>

                </td>

                <td class="p-3 border-b text-center font-semibold text-green-700">
                    <?php echo e(number_format($item->total_oreste ?? 0, 4)); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">Belum ada hasil perhitungan yang tersedia.</td>
            </tr>
            <?php endif; ?>
        </tbody>


        </table>
    </div>

    
    <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-gray-700">
        <p><b>Keterangan:</b></p>
        <ul class="list-disc ml-6 mt-1 space-y-1">
            <li><b>Ranking MOORA</b> menunjukkan urutan alternatif berdasarkan hasil metode MOORA.</li>
            <li><b>Nilai ORESTE</b> adalah hasil perangkingan preferensi antar alternatif sebagai dasar rekomendasi akhir.</li>

        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if(session('printed')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Laporan Dicetak',
        text: '<?php echo e(session('printed')); ?>',
        confirmButtonColor: '#16a34a'
    });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/laporan/index.blade.php ENDPATH**/ ?>