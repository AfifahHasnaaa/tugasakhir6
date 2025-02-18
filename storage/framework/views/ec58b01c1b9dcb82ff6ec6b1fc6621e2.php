<?php $__env->startSection('title', 'Lowongan'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/daftarlowongan.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="kontenlowongan">
    <div class="row mb-3" id="filterForm">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <input type="text" class="form-control" placeholder="Cari disini..." id="searchInput" onkeyup="filterLowongan()">
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <select id="provinsi" name="provinsi" class="form-select" onchange="filterLowongan()">
                <option>Pilih Provinsi</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <button type="button" class="btn btn-secondary" onclick="resetFilter()"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
        </div>
    </div>
    
    <!-- Daftar Lowongan -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php if($lowongan->isEmpty()): ?>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
            <div class="text-center">
                <h3 class="text-danger"><i class="bi bi-x-circle"></i> Tidak Ada Data</h3>
                <p>Belum ada lowongan yang tersedia saat ini.</p>
            </div>
        </div>
        <?php else: ?>
        <?php $__currentLoopData = $lowongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div data-aos="zoom-out" data-aos-delay="10">
            <div class="col">
                <div class="card shadow-sm">
                    <a href="<?php echo e(route('detaillowonganguest', $item->id_lowongan)); ?>">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <?php if($item->logo && file_exists(public_path('storage/logo/' . $item->logo))): ?>
                                <img src="<?php echo e(asset('storage/logo/' . $item->logo)); ?>" alt="Logo <?php echo e($item->nama_instansi); ?>" class="me-3" style="width: 100px;">
                                <?php else: ?>
                                <p class="text-center" style="width: 100px; font-size: 1rem; color: gray;">Tidak ada logo instansi</p>
                                <?php endif; ?>
                                <div style="margin-left: 15px;">
                                    <h5 class="card-title"><?php echo e($item->posisi); ?></h5>
                                    <p class="card-text"><?php echo e($item->nama_instansi); ?></p>
                                    <p class="mb-2"><i class="bi bi-briefcase"></i> <?php echo e($item->syarat_pengalaman); ?></p>
                                    <p><i class="bi bi-geo-alt"></i> <?php echo e(ucwords(strtolower($item->provinsi))); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <button id="backToTop" class="backtotop"><i class="bi bi-arrow-up-circle"></i></button>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    function ambil_provinsi() {
        var link = '<?php echo e(url("api/provinsi")); ?>';
        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#provinsi').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Provinsi : ' + errorMsg);
            }
        })
    }

    ambil_provinsi()
</script>
<script>
    function filterLowongan() {
        // Ambil input pencarian dan provinsi yang dipilih
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const selectedProvinsi = document.getElementById('provinsi').value.toLowerCase();

        // Pisahkan nilai provinsi yang dipilih menggunakan split()
        const namaProvinsi = selectedProvinsi.split('||')[1]?.toLowerCase(); // Mengambil nama provinsi saja setelah "||"

        // Ambil semua elemen lowongan
        const lowonganItems = document.querySelectorAll('.card');
        const container = document.querySelector('.row.row-cols-1'); // Container utama

        // Array untuk menyimpan elemen yang cocok
        const matchingItems = [];
        const nonMatchingItems = [];

        // Loop melalui setiap lowongan untuk memisahkan yang cocok dan tidak cocok
        lowonganItems.forEach(item => {
            const posisi = item.querySelector('.card-title').innerText.toLowerCase();
            const instansi = item.querySelector('.card-text').innerText.toLowerCase();
            const lokasi = item.querySelector('.bi-geo-alt').parentElement.innerText.toLowerCase();
            const provinsi = item.querySelector('.bi-geo-alt').parentElement.innerText.toLowerCase();

            // Filter berdasarkan pencarian posisi atau instansi
            const matchesSearch = posisi.includes(searchInput) || instansi.includes(searchInput);

            // Filter berdasarkan nama provinsi yang dipilih
            const matchesProvinsi = !namaProvinsi || lokasi.includes(namaProvinsi); // Filter berdasarkan nama provinsi saja

            // Jika lowongan cocok dengan pencarian dan provinsi, tampilkan
            if (matchesSearch && matchesProvinsi) {
                matchingItems.push(item.parentElement); // Elemen cocok
                item.parentElement.style.display = 'block'; // Tampilkan elemen
            } else {
                nonMatchingItems.push(item.parentElement); // Elemen tidak cocok
                item.parentElement.style.display = 'none'; // Sembunyikan elemen
            }
        });

        // Kosongkan kontainer dan tambahkan elemen yang cocok di awal
        container.innerHTML = '';
        matchingItems.forEach(item => container.appendChild(item));
        nonMatchingItems.forEach(item => container.appendChild(item)); // Opsional, untuk tetap menata elemen
    }

    function resetFilter() {
        // Reset input pencarian dan dropdown provinsi
        document.getElementById('searchInput').value = '';
        document.getElementById('provinsi').value = '';
        // Refresh halaman dengan URL tanpa filter
        window.location.href = "<?php echo e(route('lowonganguest')); ?>";
    }

    document.addEventListener('DOMContentLoaded', function() {
        const backToTopButton = document.getElementById('backToTop');
        const searchBar = document.getElementById('filterForm'); // Form pencarian

        // Fungsi untuk menggulir ke atas
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Fungsi untuk mengecek visibilitas form pencarian
        function checkSearchBarVisibility() {
            const rect = searchBar.getBoundingClientRect();
            const isVisible = rect.bottom > 0 && rect.top < window.innerHeight;
            if (isVisible) {
                backToTopButton.classList.remove('show');
                backToTopButton.classList.add('hide');
            } else {
                backToTopButton.classList.remove('hide');
                backToTopButton.classList.add('show');
            }
        }

        // Tambahkan event listener ke tombol
        backToTopButton.addEventListener('click', scrollToTop);

        // Periksa visibilitas saat menggulir
        window.addEventListener('scroll', checkSearchBarVisibility);

        // Periksa visibilitas saat halaman dimuat
        checkSearchBarVisibility();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/guest/lowongan.blade.php ENDPATH**/ ?>