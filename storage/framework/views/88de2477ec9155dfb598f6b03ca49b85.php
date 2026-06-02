

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-md">
        
        <h2 class="text-2xl font-bold text-center mb-4 text-green-700">
            Verifikasi Pertanyaan Keamanan
        </h2>

        <p class="text-center text-sm text-gray-500 mb-6">
            Jawab pertanyaan keamanan berikut untuk reset password.
        </p>

        
        <?php if(session('error')): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('forgot-password.verify')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <input type="hidden" name="nip" value="<?php echo e($user->nip); ?>">

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Pertanyaan Keamanan
                </label>
                <div class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
                    <?php echo e($user->pertanyaan_keamanan); ?>

                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Jawaban
                </label>
                <input type="text" name="jawaban"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300"
                       placeholder="Masukkan jawaban Anda"
                       required>
            </div>

            <button type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg transition">
                Verifikasi
            </button>

            <div class="text-center mt-4">
                <a href="<?php echo e(route('forgot-password')); ?>" class="text-sm text-gray-600 hover:underline">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/auth/verify-security.blade.php ENDPATH**/ ?>