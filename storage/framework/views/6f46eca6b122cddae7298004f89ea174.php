<?php $__env->startSection('title', 'Cetak Bukti - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/cetak.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Cetak Bukti'); ?>
<div class="card">
    <div class="card-header">
        <strong>Bukti Pengisian Data Alumni SMK N 1 Bantul</strong>
    </div>
    <div class="card-body">
        <p>Nama <span class="ms-4">:</span> <?php echo e($alumni->nama_alumni); ?></p>
        <p>NIS <span class="ms-5">:</span> <?php echo e($alumni->nis); ?></p>
        <p>Status <span class="ms-4">:</span> <?php echo e($alumni->status); ?></p>
        <p>Tanggal <span class="ms-2">:</span> <?php echo e(\Carbon\Carbon::parse($alumni->tanggal_up_data)->translatedFormat('d F Y')); ?></p>
    </div>
    <div class="btn-container">
        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/alumni/cetak.blade.php ENDPATH**/ ?>