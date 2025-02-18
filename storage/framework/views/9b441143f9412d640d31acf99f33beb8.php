
<?php $__env->startSection('title', 'Edit Profil - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/editprofil.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Edit Profil'); ?>
<div class="edit-container">
    <div class="edit-menu">
        <a href="<?php echo e(route('editprofile')); ?>" class="menu-item active">Ubah username</a>
        <a href="<?php echo e(route('editpassword')); ?>" class="menu-item">Ubah kata sandi</a>
        <a href="<?php echo e(route('profile')); ?>" class="close" title="Kembali">
            <i class="bx bx-x"></i>
        </a>
    </div>
    <div class="edit-content">
        <form action="<?php echo e(route('updateUsername')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username Baru</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username baru" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi" required>
                    <button type="button" id="togglePassword" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>

            </div>

            <div class="d-flex justify-content-end m-4 me-0">
                <button type="submit" class="simpan">Simpan</button>
            </div>
            <div class="mb-3">
                <label for="password_lama" class="form-label">Kata Sandi Lama</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan kata sandi lama" required>
                    <button type="button" id="togglePasswordLama" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_baru" class="form-label">Kata Sandi Baru</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan kata sandi baru" required>
                    <button type="button" id="togglePasswordBaru" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_baru_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_baru_confirmation" name="password_baru_confirmation" placeholder="Konfirmasi kata sandi" required>
                    <button type="button" id="togglePasswordConfirm" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php if(session('success')): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: "<?php echo e(session('success')); ?>",
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo e(route('profile')); ?>";
        }
    });
</script>
<?php endif; ?>
<script>
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/admin/edituser.blade.php ENDPATH**/ ?>