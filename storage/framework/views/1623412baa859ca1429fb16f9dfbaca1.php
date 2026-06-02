

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-xl">
    <h2 class="text-2xl font-bold text-green-700 mb-6">
        Pengaturan Akun
    </h2>

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="<?php echo e(route('kepala.pengaturan.update')); ?>" id="passwordForm">
            <?php echo csrf_field(); ?>

            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Password Baru
                </label>

                <div class="relative">
                    <input type="password" id="password"
                        name="password"
                        class="w-full border rounded px-3 py-2 pr-10"
                        required>

                    <button type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute right-3 top-2.5 text-gray-400">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            
            <div class="mb-2">
                <label class="block text-sm font-medium mb-1">
                    Konfirmasi Password
                </label>

                <div class="relative">
                    <input type="password" id="password_confirmation"
                        name="password_confirmation"
                        class="w-full border rounded px-3 py-2 pr-10"
                        required>

                    <button type="button"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute right-3 top-2.5 text-gray-400">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            
            <div class="mb-4 text-sm flex items-center" id="matchStatus">
                <i class="fa fa-times-circle text-red-600 mr-2"></i>
                <span class="text-red-600">Password belum sama</span>
            </div>

            <button type="submit" id="submitBtn"
                class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded opacity-50 cursor-not-allowed"
                disabled>
                Simpan Password
            </button>
        </form>
    </div>
</div>


<?php if(session('success')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?php echo e(session('success')); ?>',
        confirmButtonText: 'OK',
        confirmButtonColor: '#15803d'
    });
</script>
<?php endif; ?>


<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const icon = btn.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>


<script>
const password = document.getElementById('password');
const confirmPassword = document.getElementById('password_confirmation');
const status = document.getElementById('matchStatus');
const submitBtn = document.getElementById('submitBtn');

function checkMatch() {
    if (password.value && confirmPassword.value && password.value === confirmPassword.value) {
        status.innerHTML = `
            <i class="fa fa-check-circle text-green-600 mr-2"></i>
            <span class="text-green-600">Password cocok</span>
        `;
        submitBtn.disabled = false;
        submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        status.innerHTML = `
            <i class="fa fa-times-circle text-red-600 mr-2"></i>
            <span class="text-red-600">Password belum sama</span>
        `;
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
}

password.addEventListener('keyup', checkMatch);
confirmPassword.addEventListener('keyup', checkMatch);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kepala.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\spk-palawija-271025\spk-palawija\resources\views/kepala/pengaturan/index.blade.php ENDPATH**/ ?>