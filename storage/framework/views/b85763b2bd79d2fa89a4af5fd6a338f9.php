<?php $__env->startSection('title', 'TrackMyAlumni - SMK N 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/beranda.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div id="welcome" class="container-fluid">
    <div class="row content-wrapper align-items-center ms-4 me-4">
        <div class="col-md-6 text-center text-md-start text-white">
            <h1 class="fw-bold">Selamat Datang</h1>
            <p>Di Website TrackMyAlumni SMK N 1 Bantul.</p>
            <p>Silahkan lakukan pendaftaran diri anda dengan klik tombol daftar jika anda belum masuk dalam list data alumni.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="<?php echo e(asset('asset/baground/8798188_Mesa de trabajo 1.png')); ?>" alt="Graduation" class="graduation-img" style="width: 600px;">
        </div>
    </div>
</div>
<div class="container-fluid text-center">
    <?php if($prestasi->isNotEmpty()): ?>
    <div class="container-fluid mt-3">
        <div data-aos="zoom-in" data-aos-delay="10">
            <p style="text-align: left; font-weight: 900; font-size: xx-large; color: #000; text-align: center; margin-top:24px;">Prestasi Siswa</p>
        </div>
        <div data-aos="zoom-in" data-aos-delay="10">
            <div id="successStoryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" data-bs-target="#successStoryCarousel" data-bs-slide-to="<?php echo e($key); ?>" class="<?php echo e($key === 0 ? 'active' : ''); ?>" aria-current="<?php echo e($key === 0 ? 'true' : 'false'); ?>" aria-label="Slide <?php echo e($key + 1); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="carousel-inner">
                    <?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo e(asset($item->foto)); ?>" alt="<?php echo e($item->nama); ?>" class="profile-image">
                            </div>
                            <div class="col-md-9 carousel-caption text-start">
                                <h5><?php echo e($item->tempat); ?></h5>
                                <p><?php echo e($item->prestasi); ?></p>
                                <p class="fw-bold"><?php echo e($item->nama); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="10">
                        <div class="progress-box">
                            <i class="fas fa-users fa-4x" style="color :#ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalAlumni); ?></p>
                            <p style="color: #fff;">Total Alumni</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="20">
                        <div class="progress-box">
                            <i class="fa-solid fa-mars fa-4x" style="color: #ffffff; margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalLakiLaki); ?></p>
                            <p style="color: #fff;">Laki-Laki</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="30">
                        <div class="progress-box">
                            <i class="fa-solid fa-venus fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalPerempuan); ?></p>
                            <p style="color: #fff;">Perempuan</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="40">
                        <div class="progress-box">
                            <i class="fas fa-briefcase fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalBekerja); ?></p>
                            <p style="color: #fff;">Bekerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="50">
                        <div class="progress-box">
                            <i class="fas fa-university fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalKuliah); ?></p>
                            <p style="color: #fff;">Kuliah</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="60">
                        <div class="progress-box">
                            <i class="fas fa-store fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalWirausaha); ?></p>
                            <p style="color: #fff;">Wirausaha</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="70">
                        <div class="progress-box">
                            <i class="fas fa-user-clock fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalBelumBekerja); ?></p>
                            <p style="color: #fff;">Belum Bekerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="80">
                        <div class="progress-box">
                            <i class="fas fa-user-times fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;"><?php echo e($totalTidakBekerja); ?></p>
                            <p style="color: #fff;">Tidak Bekerja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($lowongan->isNotEmpty()): ?>
    <div class="container-fluid px-3 py-2 text-center">
        <div class="row mb-2">
            <div class="col-12 col-md-6 text-start">
                <div data-aos="zoom-in" data-aos-delay="90">
                    <p class="mb-0" style="font-weight: bold;">Info Lowongan</p>
                </div>
            </div>
            <div class="col-12 col-md-6 text-end">
                <div data-aos="zoom-in" data-aos-delay="90">
                    <a href="<?php echo e(route('lowonganguest')); ?>" class="selengkapnya">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div id="infolowongan" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            <?php $__currentLoopData = $lowongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div data-aos="zoom-in" data-aos-delay="<?php echo e(100 + ($index * 100)); ?>">
                    <div class="card mb-4 rounded-3 h-100 d-flex flex-column">
                        <a href="<?php echo e(route('detaillowonganguest', $item->id_lowongan)); ?>" class="d-flex flex-column h-100">
                            <div class="card-body text-center flex-grow-1 d-flex flex-column justify-content-between">
                                <p class="mb-4 font-weight-bold"><?php echo e($item->posisi); ?></p>

                                <div class="d-flex justify-content-center mb-4">
                                    <img src="<?php echo e(asset('storage/logo/' . $item->logo)); ?>" alt="Logo <?php echo e($item->nama_instansi); ?>" class="img-fluid logo">
                                </div>

                                <p class="mb-4"><?php echo e($item->nama_instansi); ?></p>

                                <p class="mb-4"><i class="fas fa-briefcase" style="margin-right: 8px;"></i><?php echo e($item->syarat_pengalaman); ?></p>

                                <p class="mb-0"><i class="fas fa-city" style="margin-right: 8px;"></i><?php echo e(ucwords(strtolower($item->provinsi))); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/guest/beranda.blade.php ENDPATH**/ ?>