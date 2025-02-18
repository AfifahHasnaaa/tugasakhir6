<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/adminLayout.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php if(Auth::guard('admin')->check()): ?>
<div class="admin">
    <div class="sidebar">
        <button class="btn-tutup" onclick="toggleSidebar()">&times;</button>
        <div class="profile-section">
            <div class="profile-picture">
                <img id="admin-photo" src="<?php echo e(Auth::guard('admin')->user()->foto ? asset('asset/profil/' . Auth::guard('admin')->user()->foto) : asset('asset/profil/Blank Profile.png')); ?>" alt="Profile">
                <div class="camera-icon">
                    <i class="bx bx-camera icon" onclick="document.getElementById('upload-photo').click();"></i>
                </div>
            </div>
            <form id="photo-form" action="<?php echo e(route('admin.updatePhoto')); ?>" method="POST" enctype="multipart/form-data" style="display:none;">
                <?php echo csrf_field(); ?>
                <input type="file" name="foto" id="upload-photo" accept="image/*" onchange="previewPhoto()">
            </form>
            <h4><?php echo e(Auth::guard('admin')->user()->username); ?></h4>
            <p><?php echo e(Auth::guard('admin')->user()->tanggal_buat->translatedformat('d F Y')); ?></p>
        </div>
        <ul class="menu">
            <li class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <span class="icon"><i class='bi bi-house'></i></span>Dashboard
                </a>
            </li>
            <li class="<?php echo e(request()->routeIs(['dataalumniadmin','detailalumni']) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('dataalumniadmin')); ?>">
                    <span class="icon"><i class='bi bi-list-columns-reverse'></i></span>Data Alumni
                </a>
            </li>
            <li>
                <a href="#" class="submenu-toggle" onclick="toggleDropdown('lowongan', event)">
                    <i class='bi bi-newspaper icon'></i> Lowongan <span class="toggle-icon">▼</span>
                </a>
                <ul id="lowongan" class="submenu-content collapse">
                    <li class="<?php echo e(request()->routeIs(['lowonganadmin', 'detaillowonganadmin']) ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('lowonganadmin')); ?>"><span class="icon"><i class='bi bi-circle'></i></span>Lowongan</a>
                    </li>
                    <li class="<?php echo e(request()->routeIs('tambahlowongan') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('tambahlowongan')); ?>"><span class="icon"><i class='bi bi-circle'></i></span>Tambah Lowongan</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo e(request()->routeIs(['prestasi','tambahprestasi','editprestasi']) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('prestasi')); ?>">
                    <span class="icon"><i class='bi bi-award'></i></span>Prestasi
                </a>
            </li>
            <li class="<?php echo e(request()->routeIs(['datauser']) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('datauser')); ?>">
                    <span class="icon"><i class='bi bi-person'></i></span>Data User
                </a>
            </li>
            <li class="<?php echo e(request()->routeIs(['profileadmin','editprofileadmin','editpasswordadmin']) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('profileadmin')); ?>">
                    <span class="icon"><i class='bi bi-person'></i></span>Profil
                </a>
            </li>
            <li class="<?php echo e(request()->routeIs('keluar') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('keluar')); ?>" onclick="event.preventDefault(); confirmLogout();">
                    <span class="icon"><i class='bi bi-box-arrow-left'></i></span>Keluar
                </a>
            </li>
        </ul>
    </div>
    <div class="konten" id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #254e7a">
            <button class="btn btn-hamburger"><span class="hamburger" onclick="toggleSidebar()">&#9776;</span></button>
            <div class="overlay" onclick="toggleSidebar()"></div>
            <span class="navbar-brand ml-2 text-white text start"><?php echo $__env->yieldContent('judul'); ?></span>
        </nav>
        <?php echo $__env->yieldContent('konten'); ?>
    </div>
</div>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('login.admin')); ?>";
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const content = document.getElementById('page-content-wrapper');
        const hamburgerButton = document.querySelector('.hamburger');
        const overlay = document.querySelector('.overlay');
        if (sidebar.classList.contains('sidebar-hidden')) {
            sidebar.classList.remove('sidebar-hidden');
            sidebar.classList.add('visible');
            overlay.classList.add('visible');
            content.classList.remove('content-collapsed');
            hamburgerButton.style.display = 'none';
        } else {
            sidebar.classList.add('sidebar-hidden');
            sidebar.classList.remove('visible');
            overlay.classList.remove('visible');
            content.classList.add('content-collapsed');
            hamburgerButton.style.display = 'block';
        }
    }

    function previewPhoto() {
        const file = document.getElementById('upload-photo').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('admin-photo').src = e.target.result;
            }
            reader.readAsDataURL(file);
            uploadPhoto();
        }
    }

    function uploadPhoto() {
        const form = document.getElementById('photo-form');
        const formData = new FormData(form);

        fetch(form.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal memproses respons dari server.');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => location.reload());
                } else {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal memperbarui foto.',
                        icon: 'error',
                        confirmButtonText: 'Coba Lagi'
                    });
                }
            })
            .catch(error => Swal.fire({
                title: 'Terjadi Kesalahan!',
                text: 'Terjadi kesalahan saat mengunggah foto.',
                icon: 'error',
                confirmButtonText: 'OK'
            }));
    }

    function toggleDropdown(dropdownId, event) {
        event.preventDefault();
        const dropdown = document.getElementById(dropdownId);
        const toggleIcon = dropdown.previousElementSibling.querySelector('.toggle-icon');

        dropdown.classList.toggle('collapse');
        dropdown.classList.toggle('expand');
        toggleIcon.textContent = dropdown.classList.contains('expand') ? '▲' : '▼';
    }

    function confirmLogout() {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan keluar dari website ini",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Keluar",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Keluar",
                    text: "Klik oke untuk ke halaman awal",
                    icon: "success"
                }).then(() => window.location.href = "<?php echo e(route('keluar')); ?>");
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.mainadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/layout/adminLayout.blade.php ENDPATH**/ ?>