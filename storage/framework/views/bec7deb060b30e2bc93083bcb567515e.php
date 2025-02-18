<?php $__env->startSection('title', 'Tracking Alumni SMK N 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('asset/bootstrap-5.3.3-dist/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Dashboard'); ?>
<div class="konten1 mb-4">
    <div class="container-fluid d-md-flex align-items-center">
        <div class="welcome text-center text-md-center">
            <h2 class="fw-bold" style="font-size: x-large">Halo, Alumni SMK N 1 Bantul!</h2>
            <p>Selamat datang di website TrackMyAlumni, tempat kita menjaga koneksi dan berbagi cerita sukses. Jangan lupa untuk mengisi form alumni berikut agar kami dapat mengenal perjalanan Anda lebih dekat.</p>
            <div class="group-button">
                <button class="formalumni-btn"><a href="<?php echo e(route('formalumni')); ?>">Form Alumni</a></button>
            </div>
        </div>

    </div>

</div>
<div class="container-fluid mt-3">
    <h3 class="text-center fw-bold mb-4">Statistik Alumni</h3>
    <div class="row m-2">
        <div class="col-md-4">
            <div class="progress-box" data-aos="zoom-in" data-aos-delay="20">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <i class="fas fa-users fa-4x" style="color: #ffffff;"></i>
                    </div>
                    <div class="text-right">
                        <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalAlumni); ?></h3>
                        <p class="mb-0">TOTAL ALUMNI</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="progress-box" data-aos="zoom-in" data-aos-delay="20">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <i class="fa-solid fa-mars fa-4x" style="color: #ffffff;"></i>
                    </div>
                    <div class="text-right">
                        <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalLakiLaki); ?></h3>
                        <p class="mb-0">TOTAL LAKI-LAKI</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="progress-box" data-aos="zoom-in" data-aos-delay="20">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-left">
                        <i class="fa-solid fa-venus fa-4x" style="color: #ffffff;"></i>
                    </div>
                    <div class="text-right">
                        <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalPerempuan); ?></h3>
                        <p class="mb-0">TOTAL PEREMPUAN</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container d-flex flex-column align-items-center">
        <div class="d-flex mb-3 w-100">
            <div class="d-flex gap-3 align-items-center">
                <label for="tahun" style="font-weight: 600;">Tahun :</label>
                <input class="form-control" type="number" id="tahun" value="<?php echo e(now()->year); ?>" style="width: 150px;" />
            </div>
        </div>
        <div class="d-flex align-items-center p-2 mb-3" style="width: 100%; background-color: #ffffff; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <canvas id="alumniChart"></canvas>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let chart;

    async function fetchData(tahun) {
        const response = await fetch(`/chart-data-alumni?tahun=${tahun}`);
        return response.json();
    }

    const colorMap = {
        'Bekerja': '#254e7a',
        'Wirausaha': '#5584b0',
        'Pendidikan Lanjut': '#82c2e6',
        'Belum Bekerja': '#cbe3ef',
        'Tidak Bekerja': '#f7f3ea'
    };

    const customOrder = ['Bekerja', 'Wirausaha', 'Pendidikan Lanjut', 'Belum Bekerja', 'Tidak Bekerja'];

    async function createChart() {
        const tahun = document.getElementById('tahun').value;
        const data = await fetchData(tahun);

        const statuses = Object.keys(data).sort((a, b) => customOrder.indexOf(a) - customOrder.indexOf(b));
        const statusCounts = statuses.map(status => data[status][tahun] || 0);
        const ctx = document.getElementById('alumniChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: statuses,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: statuses.map(status => colorMap[status] || '#cccccc')
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 1000,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Alumni'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Status Alumni'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    }

    async function updateChart() {
        const tahun = document.getElementById('tahun').value;
        const data = await fetchData(tahun);

        const statuses = Object.keys(data).sort((a, b) => customOrder.indexOf(a) - customOrder.indexOf(b));
        const statusCounts = statuses.map(status => data[status][tahun] || 0);
        chart.data.labels = statuses;
        chart.data.datasets[0].data = statusCounts;
        chart.data.datasets[0].backgroundColor = statuses.map(status => colorMap[status] || '#cccccc');
        chart.update();
    }

    document.getElementById('tahun').addEventListener('input', updateChart);

    createChart();
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/alumni/homealumni.blade.php ENDPATH**/ ?>