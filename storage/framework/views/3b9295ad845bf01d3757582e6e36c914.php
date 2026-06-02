
<?php $__env->startSection('title', 'Dashboard Kepala Dinas'); ?>

<?php $__env->startSection('sidebar'); ?>
    <a href="<?php echo e(route('kepala.dashboard')); ?>" 
    class="flex items-center gap-2 p-2 rounded <?php echo e(request()->routeIs('kepala.dashboard') ? 'bg-green-800 text-white' : 'hover:bg-green-800 text-white/80'); ?>">
        <i class="fas fa-home"></i> 
        <span>Dashboard</span>
    </a>

    <a href="<?php echo e(route('kepala.perhitungan')); ?>" 
    class="flex items-center gap-2 p-2 rounded <?php echo e(request()->routeIs('kepala.perhitungan') ? 'bg-green-800 text-white' : 'hover:bg-green-800 text-white/80'); ?>">
        <i class="fas fa-chart-line"></i> 
        <span>Hasil Perhitungan</span>
    </a>

    <a href="<?php echo e(route('kepala.laporan')); ?>" 
    class="flex items-center gap-2 p-2 rounded <?php echo e(request()->routeIs('kepala.laporan') ? 'bg-green-800 text-white' : 'hover:bg-green-800 text-white/80'); ?>">
        <i class="fas fa-file-alt"></i> 
        <span>Laporan</span>
    </a>
    <a href="<?php echo e(route('kepala.pengaturan')); ?>" 
    class="flex items-center gap-2 p-2 rounded <?php echo e(request()->routeIs('kepala.pengaturan') ? 'bg-green-800 text-white' : 'hover:bg-green-800 text-white/80'); ?>">
        <i class="fas fa-cog"></i> 
        <span>Pengaturan</span>
    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="mt-4 border-t border-green-600 pt-3">
        <?php echo csrf_field(); ?>
        <button type="button" id="logout-btn"
            class="flex items-center gap-2 w-full text-left bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md transition">
            <i class="fas fa-power-off"></i> <span>Logout</span>
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header', 'Dashboard Kepala Dinas'); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-green-700 mb-4">Rekomendasi Benih Terbaik</h2>
    <div class="p-6 bg-green-50 border-l-4 border-green-600 rounded-lg">
        <p class="text-lg text-gray-700">
            🌾 <strong><?php echo e($rekomendasi ?? 'Belum Ada Data'); ?></strong> 
            direkomendasikan sebagai benih terbaik untuk musim tanam berikutnya.
        </p>
    </div>
</div>

<div class="mt-10 bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-semibold text-green-700 mb-6">Grafik Nilai Akhir (ORESTE)</h2>

    <div class="w-full h-80">
        <canvas id="grafikAlternatif"></canvas>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('grafikAlternatif').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($chartLabels ?? [], 15, 512) ?>, // FIX INI
            datasets: [{
                label: 'Nilai Akhir ORESTE',
                data: <?php echo json_encode($chartValues ?? [], 15, 512) ?>, // FIX INI
                backgroundColor: 'rgba(72, 187, 120, 0.5)',
                borderColor: 'rgba(34, 139, 34, 1)',
                borderWidth: 1,
                maxBarThickness: 50
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true },
                datalabels: {
                    color: '#000',
                    anchor: 'end',
                    align: 'top',
                    formatter: (value) => value.toFixed(4)
                }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/kepala/dashboard.blade.php ENDPATH**/ ?>