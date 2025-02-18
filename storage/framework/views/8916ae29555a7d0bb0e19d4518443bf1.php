<?php $__env->startSection('title','Edit Profil - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/editprofil.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Edit Profil Admin'); ?>
<div class="edit-container">
    <div class="edit-menu">
        <a href="<?php echo e(route('editprofileadmin')); ?>" class="menu-item">Ubah username</a>
        <a href="<?php echo e(route('editpasswordadmin')); ?>" class="menu-item active">Ubah kata sandi</a>
        <a href="<?php echo e(route('profileadmin')); ?>" class="close" title="Kembali">
            <i class="bx bx-x"></i>
        </a>
    </div>
    <div class="edit-content">
        <form action="<?php echo e(route('updatePasswordAdmin')); ?>" method="POST">
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

            <div class="d-flex justify-content-end m-4 me-0">
                <button type="submit" class="simpan">Simpan</button>
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
            window.location.href = "<?php echo e(route('profileadmin')); ?>";
        }
    });
</script>
<?php endif; ?>
<script>
    const togglePasswordLamaButton = document.getElementById('togglePasswordLama');
    const passwordInputLama = document.getElementById('password_lama');

    togglePasswordLamaButton.addEventListener('click', function() {
        const type = passwordInputLama.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputLama.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });

    const togglePasswordBaruButton = document.getElementById('togglePasswordBaru');
    const passwordInputBaru = document.getElementById('password_baru');

    togglePasswordBaruButton.addEventListener('click', function() {
        const type = passwordInputBaru.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputBaru.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });

    const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirm');
    const passwordInputConfirm = document.getElementById('password_baru_confirmation');

    togglePasswordConfirmButton.addEventListener('click', function() {
        const type = passwordInputConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputConfirm.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/admin/editpassword.blade.php ENDPATH**/ ?>