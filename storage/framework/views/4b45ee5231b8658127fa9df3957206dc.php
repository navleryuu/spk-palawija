

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-white rounded-2xl shadow relative">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-trophy text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Perangkingan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Perangkingan ORESTE </span>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700">Perangkingan ORESTE </h1>
    </div>

    <?php if($message): ?>
        <div class="p-4 mb-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded">
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>

    <div class="space-y-3">

        
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(1)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">1. Matriks Preferensi Antar Alternatif</span>
                <i id="icon-1" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-1" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b text-center">Alternatif</th>
                            <?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th class="p-3 border-b text-center">
                                    (<?php echo e(strtoupper($alt->alternatif->code ?? 'A?')); ?>) <?php echo e($alt->alternatif->nama); ?>

                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700">
                                    (<?php echo e(strtoupper($a1->alternatif->code ?? 'A?')); ?>) <?php echo e($a1->alternatif->nama); ?>

                                </td>
                                <?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="p-3 border-b text-center">
                                        <?php echo e($preferensi[$a1->alternatif->nama][$a2->alternatif->nama] ?? 0); ?>

                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(2)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">2. Total Preferensi Tiap Alternatif</span>
                <i id="icon-2" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-2" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Total Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $totalPreferensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $altName => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700"><?php echo e($altName); ?></td>
                                <td class="p-3 border-b text-center"><?php echo e($total); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

       
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(3)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">3. Normalisasi Nilai Preferensi (Skor ORESTE)</span>
                <i id="icon-3" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-3" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Skor Normalisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $hasil_oreste; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold text-gray-700">
                                   <?php echo e($h['alternatif']); ?>

                                </td>
                                <td class="p-3 border-b text-center"><?php echo e($h['skor']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>


        
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(4)" class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">4. Hasil Akhir dan Peringkat ORESTE</span>
                <i id="icon-4" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-4" class="hidden p-4 bg-white border-t border-green-200">
                <table class="w-full border border-green-200 text-sm">
                    <thead class="bg-green-50 text-green-800">
                        <tr>
                            <th class="p-3 border-b text-center">Peringkat</th>
                            <th class="p-3 border-b">Alternatif</th>
                            <th class="p-3 border-b text-center">Skor ORESTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $hasil_oreste; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b text-center font-semibold"><?php echo e($h['no']); ?></td>
                                <td class="p-3 border-b text-center"> <?php echo e($h['alternatif']); ?></td>
                                <td class="p-3 border-b text-center"><?php echo e($h['skor']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
function toggleStep(step) {
    const content = document.getElementById(`step-${step}`);
    const icon = document.getElementById(`icon-${step}`);

    if (content.classList.contains('hidden')) {
        document.querySelectorAll('[id^="step-"]').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('[id^="icon-"]').forEach(ic => ic.classList.replace('fa-chevron-up', 'fa-chevron-down'));

        content.classList.remove('hidden');
        icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
    } else {
        content.classList.add('hidden');
        icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/perangkingan/index.blade.php ENDPATH**/ ?>