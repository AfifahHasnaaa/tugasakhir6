<link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
<div class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://home.amikom.ac.id/">
            <img src="<?php echo e(asset('asset/logo/Logo_Amikom.png')); ?>">
        </a>
        <a class="navbar-brand" href="#">
            <img src="<?php echo e(asset('asset/logo/SMK_Negeri_1_Bantul.png')); ?>">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('dataalumnii') ? 'active' : ''); ?>" href="<?php echo e(url('dataalumnii')); ?>">Data Alumni</a>
                </li>
                <li class="nav-item">
                    <?php if(Auth::check()): ?>
                    <!-- Jika pengguna sudah login -->
                    <a class="nav-link <?php echo e(request()->is('inputalumni') ? 'active' : ''); ?>" href="<?php echo e(url('inputalumni')); ?>">Form Alumni</a>
                    <?php else: ?>
                    <!-- Jika pengguna belum login, arahkan ke halaman login -->
                    <a class="nav-link" href="<?php echo e(url('login')); ?>">Form Alumni</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is(['lowongann', 'detaillowongann/*']) ? 'active' : ''); ?>" href="<?php echo e(route('lowonganguest')); ?>">Lowongan Kerja</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php echo e(request()->is('tentang') ? 'active' : ''); ?>" href="<?php echo e(url('tentang')); ?>">Info</a>
                </li>
            </ul>
            <ul class="nav ms-auto col-12 col-lg-auto mb-md-0 text-end">
                <li>
                    <div class="user-actions">
                        <button class="masuk">
                            <a href="<?php echo e(url('login')); ?>">Masuk</a>
                        </button>
                        <button class="daftar">
                            <a href="<?php echo e(route('register')); ?>">Daftar</a>
                        </button>
                    </div>
                </li>
                <!-- <li>
                    <a href="">
                        <div>
                            <img src="<?php echo e(asset('asset/profil/profil.png')); ?>" alt="" width="40">
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/layout/header.blade.php ENDPATH**/ ?>