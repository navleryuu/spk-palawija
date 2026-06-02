

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-4 text-green-700">
            Lupa Password
        </h2>
        <p class="text-center text-sm text-gray-500 mb-6">
            Masukkan NIP Anda untuk reset password.
        </p>

        
        <?php if(session('error')): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        
        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                <p class="font-semibold">
                    <?php echo e(session('success')); ?>

                </p>

                <p class="mt-2 text-sm">
                    Password default Anda:
                </p>

                <p class="mt-1 text-center font-bold text-lg bg-green-200 rounded py-2">
                    <?php echo e(session('default_password')); ?>

                </p>

                <p class="text-xs text-gray-600 mt-2 text-center">
                    Silakan login dan segera ubah password melalui menu Pengaturan.
                </p>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('forgot.password')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    NIP
                </label>
                <input type="text" name="nip"
                       class="w-full border border-gray-300 rounded px-3 py-2
                              focus:outline-none focus:ring focus:ring-green-300"
                       placeholder="Masukkan NIP Anda"
                       required>
            </div>

            <button type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg transition">
                Reset Password
            </button>

            <div class="text-center mt-4">
                <a href="<?php echo e(url('/')); ?>" class="text-sm text-gray-600 hover:underline">
                    Kembali ke Beranda
                </a>
            </div>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>