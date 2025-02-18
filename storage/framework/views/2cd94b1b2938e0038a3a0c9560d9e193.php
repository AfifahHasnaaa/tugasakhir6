<?php $__env->startSection('title','Detail Lowongan - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/detaillowongan.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Detail Lowongan'); ?>
<div class="detail-lowongan">
    <div class="row container-fluid pt-2 pb-1 ">
        <div class="row align-items-center">
            <div class="col-9">
                <h3 class="text-start" style="font-weight: 500;">
                    <?php echo e($lowongan->nama_instansi); ?>

                </h3>
                <h6 class="text-start" style="color:#6C757D">
                    Membuka Lowongan
                </h6>
                <h1 class="text-start" style="font-weight: 800;">
                    <?php echo e($lowongan->posisi); ?>

                </h1>
            </div>
            <div class="col-3 logo-instansi text-end">
                <?php if($lowongan->logo && file_exists(public_path('storage/logo/' . $lowongan->logo))): ?>
                <img src="<?php echo e(asset('storage/logo/' . $lowongan->logo)); ?>" alt="Logo <?php echo e($lowongan->nama_instansi); ?>" class="me-3" style="width: 150px; height:150px; object-fit: contain;">
                <?php else: ?>
                <p class="text-center" style="width: 100px; font-size: 1 rem; color: gray;">Tidak ada logo instansi</p>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <p class="text-start" style="font-size: medium; font-weight: 400;">
                <?php echo e($lowongan->deskripsi); ?>

            </p>
        </div>
    </div>
    <hr>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Ringkasan
        </div>
        <div>
            <p><img src="<?php echo e(asset('asset/icon/pengalaman.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto"><?php echo e($lowongan->syarat_pengalaman); ?></span></p>
        </div>
        <div>
            <p><img src="<?php echo e(asset('asset/icon/gender.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto"><?php echo e($lowongan->gender); ?></span></p>
        </div>
        <div>
            <p>
                <img src="<?php echo e(asset('asset/icon/gaji.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto">
                <span class="text-center pt-auto pb-auto">
                    <?php if($lowongan->gaji == 'UMR' || $lowongan->gaji == 'Kompetitif'): ?>
                    <?php echo e($lowongan->gaji); ?>

                    <?php else: ?>
                    Rp <?php echo e(number_format($lowongan->gaji, 0, ',', '.')); ?>

                    <?php endif; ?>
                </span>
            </p>
        </div>
        <div>
            <p><img src="<?php echo e(asset('asset/icon/lokasi.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto"><?php echo e(ucwords(strtolower( $lowongan->alamat))); ?>, <?php echo e(ucwords(strtolower( $lowongan->kelurahan))); ?>, <?php echo e(ucwords(strtolower( $lowongan->kecamatan))); ?>, <?php echo e(ucwords(strtolower( $lowongan->kabupaten))); ?>, <?php echo e(ucwords(strtolower( $lowongan->provinsi))); ?></span></p>
        </div>
    </div>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Deskripsi Pekerjaan
        </div>
        <ul>
            <?php $__currentLoopData = explode("\n", $lowongan->deskripsi_pekerjaan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deskripsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(trim($deskripsi) != ''): ?>
            <li><?php echo e($deskripsi); ?></li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Syarat
        </div>
        <ul>
            <?php $__currentLoopData = explode("\n", $lowongan->syarat_pekerjaan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syarat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(trim($syarat) != ''): ?>
            <li><?php echo e($syarat); ?></li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div>
        <div class="pt-1 pb-2" style="font-size:large;font-weight:bold">
            Kirim Lamaran
        </div>
        <div>
            <p><img src="<?php echo e(asset('asset/icon/telephone.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto"><?php echo e($lowongan->no_kontak); ?></span></p>
        </div>
        <div>
            <p><img src="<?php echo e(asset('asset/icon/emaill.png')); ?>" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto"><?php echo e($lowongan->email); ?></span></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/alumni/detaillowongan.blade.php ENDPATH**/ ?>