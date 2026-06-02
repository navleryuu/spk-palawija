

<?php $__env->startSection('content'); ?>


<div class="p-6 bg-white rounded-2xl shadow relative">
    
    <div class="flex items-center mb-4 text-sm text-gray-600">
        <i class="fas fa-calculator text-green-600 mr-2"></i>
        <span class="font-semibold text-green-700">Perhitungan</span>
        <span class="mx-2">/</span>
        <span class="text-gray-500">Proses Perhitungan MOORA</span>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700">Proses Perhitungan MOORA</h1>
        <button class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 shadow-sm"
                onclick="document.getElementById('modalTambah').classList.remove('hidden')">
            <i class="fas fa-plus mr-1"></i> Tambah Perhitungan
        </button>
    </div>

    
    <div class="space-y-3">
        
        <div class="border border-green-200 rounded-xl overflow-hidden">
            <button type="button" onclick="toggleStep(1)"
                class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">1. Matriks Keputusan</span>
                <i id="icon-1" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-1" class="hidden p-4 bg-white border-t border-green-200">
                <h2 class="text-lg font-bold text-green-700 mb-3">Matriks Keputusan</h2>

                <div class="overflow-x-auto">
                    <table class="w-full border border-green-200 text-sm">
                        <thead class="bg-green-50 text-green-800">
                            <tr>
                                <th class="p-3 border-b">Alternatif</th>
                                <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="p-3 border-b text-center">
                                        (<?php echo e(strtoupper($k->kode)); ?>) <?php echo e($k->nama_kriteria); ?>

                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $alternatifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-green-50">
                                    <td class="p-3 border-b text-center font-semibold text-gray-700">
                                        (<?php echo e(strtoupper($alt->code)); ?>) <?php echo e($alt->nama); ?>

                                    </td>
                                    <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="p-3 border-b text-center">
                                            <?php echo e($alt->nilai->where('kriteria_id', $k->id)->first()->nilai ?? '-'); ?>

                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="border border-green-200 rounded-xl overflow-hidden mt-3">
            <button type="button" onclick="toggleStep(2)"
                class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">2. Normalisasi Matriks</span>
                <i id="icon-2" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-2" class="hidden p-4 bg-white border-t border-green-200">
                <h2 class="text-lg font-bold text-green-700 mb-3">Normalisasi Matriks</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-green-200 text-sm">
                        <thead class="bg-green-50 text-green-800">
                            <tr>
                                <th class="p-3 border-b ">Alternatif</th>
                                <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="p-3 border-b text-center">
                                        (<?php echo e(strtoupper($k->kode)); ?>) <?php echo e($k->nama_kriteria); ?>

                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $normalisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $altKey => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // ambil alternatif terkait dari DB biar bisa panggil code
                                    $alt = $alternatifs->firstWhere('nama', $altKey);
                                ?>
                                <tr class="hover:bg-green-50">
                                    <td class="p-3 border-b text-center font-semibold text-gray-700">
                                        (<?php echo e(strtoupper($alt->code ?? 'A?')); ?>) <?php echo e($altKey); ?>

                                    </td>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="p-3 border-b text-center"><?php echo e(number_format($val, 4)); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="border border-green-200 rounded-xl overflow-hidden mt-3">
            <button type="button" onclick="toggleStep(3)"
                class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">3. Matriks Terbobot</span>
                <i id="icon-3" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-3" class="hidden p-4 bg-white border-t border-green-200">
                <h2 class="text-lg font-bold text-green-700 mb-3">Matriks Terbobot</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-green-200 text-sm">
                        <thead class="bg-green-50 text-green-800">
                            <tr>
                                <th class="p-3 border-b">Alternatif</th>
                                <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="p-3 border-b text-center">
                                        (<?php echo e(strtoupper($k->kode)); ?>) <?php echo e($k->nama_kriteria); ?>

                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $terbobot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $altKey => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $alt = $alternatifs->firstWhere('nama', $altKey);
                                ?>
                                <tr class="hover:bg-green-50">
                                    <td class="p-3 border-b text-center font-semibold text-gray-700">
                                        (<?php echo e(strtoupper($alt->code ?? 'A?')); ?>) <?php echo e($altKey); ?>

                                    </td>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="p-3 border-b text-center"><?php echo e(number_format($val, 4)); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="border border-green-200 rounded-xl overflow-hidden mt-3">
            <button type="button" onclick="toggleStep(4)"
                class="w-full flex justify-between items-center p-4 bg-green-50 hover:bg-green-100 transition">
                <span class="font-semibold text-green-700">4. Hasil Akhir & Peringkat</span>
                <i id="icon-4" class="fas fa-chevron-down text-green-600"></i>
            </button>
            <div id="step-4" class="hidden p-4 bg-white border-t border-green-200">
                <h2 class="text-lg font-bold text-green-700 mb-3">Hasil Akhir dan Peringkat</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-green-200 text-sm">
                        <thead class="bg-green-50 text-green-800">
                            <tr>
                                <th class="p-3 border-b text-center">Peringkat</th>
                                <th class="p-3 border-b text-center">Alternatif</th>
                                <th class="p-3 border-b text-center">Skor Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ranking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $alt = $alternatifs->firstWhere('nama', $r['alternatif']);
                                ?>
                                <tr class="hover:bg-green-50">
                                    <td class="p-3 border-b text-center font-semibold"><?php echo e($r['no']); ?></td>
                                    <td class="p-3 border-b text-center">
                                        (<?php echo e(strtoupper($alt->code ?? 'A?')); ?>) <?php echo e($r['alternatif']); ?>

                                    </td>
                                    <td class="p-3 border-b text-center"><?php echo e($r['skor']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div id="modalTambah" class="hidden fixed inset-0 bg-black/40 flex justify-center items-center z-50">
        <div class="bg-white rounded-2xl w-3/5 p-6 shadow-lg">
            <h2 class="text-xl font-bold text-green-700 mb-4">Tambah Perhitungan MOORA</h2>

            <form action="<?php echo e(route('perhitungan.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-4">
                    <label class="font-semibold text-gray-700">Pilih Alternatif</label>
                    <select name="alternatif_id" class="w-full border rounded-xl p-2">
                        <option value="">-- Pilih Lokasi --</option>
                        <?php $__currentLoopData = $alternatifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($alt->id); ?>">
                                (<?php echo e(strtoupper($alt->code)); ?>) <?php echo e($alt->nama); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3">
                        <label class="font-semibold text-gray-700">
                            (<?php echo e(strtoupper($kriteria->kode)); ?>) <?php echo e($kriteria->nama_kriteria); ?>

                            <small class="text-gray-500">
                                (Bobot: <?php echo e($kriteria->bobot); ?> | Jenis: <?php echo e(ucfirst($kriteria->tipe)); ?>)
                            </small>
                        </label>
                        <select name="nilai[<?php echo e($kriteria->id); ?>]" class="w-full border rounded-xl p-2">
                            <option value="">-- Pilih Subkriteria --</option>
                            <?php $__currentLoopData = $kriteria->subkriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub->nilai); ?>"><?php echo e($sub->nama_subkriteria); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                        Simpan
                    </button>
                    <button type="button" 
                            onclick="document.getElementById('modalTambah').classList.add('hidden')" 
                            class="ml-2 px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">
                        Batal
                    </button>
                </div>
            </form>
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

<?php echo $__env->make('admin.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/perhitungan/index.blade.php ENDPATH**/ ?>