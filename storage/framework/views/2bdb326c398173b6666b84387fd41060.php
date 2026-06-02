<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?> 
</head>
<body class="bg-gray-50 min-h-screen flex">
    
    <aside class="w-64 bg-green-700 text-white flex flex-col">
        <div class="flex items-center justify-center gap-3 p-4 text-2xl font-bold border-b border-green-500">
            <img src="<?php echo e(asset('images/logo-dinas.png')); ?>" 
                alt="Logo SPK Palawija" 
                class="w-10 h-10 object-contain">
            <span class="text-white">SPK Palawija</span>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <?php echo $__env->yieldContent('sidebar'); ?> 
            
        </nav>
        
        <div class="p-4 text-sm text-center border-t border-green-500">
            © 2025 UPTD Benih Induk Palawija Tanjung Selamat
        </div>
    </aside>

    
    <main class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold text-green-700 mb-6"><?php echo $__env->yieldContent('header'); ?></h1>
        <div id="content-area">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    
    
    
    

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        // Cek apakah tombol logout ada di DOM (hanya ada di admin.dashboard)
        const logoutBtn = document.getElementById('logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
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
                        // Submit form logout setelah dikonfirmasi
                        document.getElementById('logout-form').submit();
                    }
                });
            });
        }
    </script>

    
    
    

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/layouts/main.blade.php ENDPATH**/ ?>