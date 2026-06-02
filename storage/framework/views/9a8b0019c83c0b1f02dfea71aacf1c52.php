<?php $__env->startSection('title', 'Dashboard Admin'); ?>


<?php $__env->startSection('sidebar'); ?>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-2 p-2 bg-green-800 rounded hover:bg-green-700">
        <i class="fas fa-home"></i> <span>Dashboard</span>
    </a>

    <a href="<?php echo e(route('kriteria.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-chart-bar"></i> <span>Kriteria</span>
    </a>

    <a href="<?php echo e(route('alternatif.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-seedling"></i> <span>Alternatif</span>
    </a>

    <a href="<?php echo e(route('perhitungan.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-calculator"></i> <span>Perhitungan</span>
    </a>

    <a href="<?php echo e(route('perangkingan.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-trophy"></i> <span>Perangkingan</span>
    </a>

    <a href="<?php echo e(route('laporan.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-file-alt"></i> <span>Laporan</span>
    </a>

    <a href="<?php echo e(route('admin.users.index')); ?>" class="flex items-center gap-2 p-2 hover:bg-green-800 rounded">
        <i class="fas fa-users-cog"></i> <span>Manajemen User</span>
    </a>

    
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="mt-4 border-t border-green-600 pt-3">
        <?php echo csrf_field(); ?>
        <button type="button" id="logout-btn"
            class="flex items-center gap-2 w-full text-left bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md transition">
            <i class="fas fa-power-off"></i> <span>Logout</span>
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header', 'Dashboard Admin'); ?>


<?php $__env->startSection('content'); ?>


<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold text-green-600 mb-2">Total Kriteria</h2>
        <p class="text-4xl font-bold text-gray-700"><?php echo e($totalKriteria ?? 0); ?></p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold text-green-600 mb-2">Total Alternatif</h2>
        <p class="text-4xl font-bold text-gray-700"><?php echo e($totalAlternatif ?? 0); ?></p>
    </div>

    
</div>


<div class="mt-6 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold text-green-600 mb-3">Rekomendasi Benih Terbaik</h2>

    <?php if(isset($benihTerbaik)): ?>
        <p class="text-xl font-medium text-gray-700"><?php echo e($benihTerbaik->alternatif); ?></p>
        <p class="text-gray-500 text-sm mt-1">
            Nilai Akhir: <?php echo e(number_format($benihTerbaik->nilai_oreste, 4)); ?>

        </p>

    <?php else: ?>
        <p class="text-gray-500">Belum ada hasil perhitungan.</p>
    <?php endif; ?>

</div>


<div class="mt-6 bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold text-green-600 mb-4">Grafik Ranking Alternatif</h2>

    
    <div class="w-full h-64">
        <canvas id="rankingChart"></canvas>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    document.getElementById('logout-btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Logout?',
            text: 'Apakah kamu yakin ingin keluar dari sistem?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#16a34a',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fas fa-power-off"></i> Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('rankingChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($chartLabels ?? [], 15, 512) ?>,
            datasets: [{
                label: 'Nilai Ranking',
                data: <?php echo json_encode($chartValues ?? [], 15, 512) ?>,
                backgroundColor: 'rgba(72, 187, 120, 0.5)',
                borderColor: 'rgba(34, 139, 34, 1)',
                borderWidth: 1,
                maxBarThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, 
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>