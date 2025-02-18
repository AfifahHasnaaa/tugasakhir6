<?php $__env->startSection('title','Profil - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/profilalumni.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Profil Admin'); ?>
<div class="profile-container">
    <div class="profile-content">
        <div class="profile-info">
            <p class="label">Nama Pengguna</p>
            <p><?php echo e(Auth::guard('admin')->user()->username); ?></p>
        </div>
        <div class="profile-info">
            <p class="label">Email</p>
            <p><?php echo e(Auth::guard('admin')->user()->email); ?></p>
        </div>
        <div class="profile-info">
            <p class="label">Kata Sandi</p>
            <p><?php echo e(str_repeat('*', 8)); ?></p>
        </div>
        <div class="profile-info">
            <p class="label">Tanggal Buat</p>
            <p><?php echo e(Auth::guard('admin')->user()->tanggal_buat->translatedformat('d F Y')); ?></p>
        </div>
        <div class="profile-info">
            <p class="label">Terakhir Login</p>
            <p><?php echo e(Auth::guard('admin')->user()->tanggal_login->translatedformat('d F Y')); ?></p>
        </div>
    </div>
    <div class="profile-footer">
        <a href="<?php echo e(route('editprofileadmin')); ?>" class="btn-ubah">Edit Profil</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/admin/profile.blade.php ENDPATH**/ ?>