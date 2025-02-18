<?php $__env->startSection('title', 'Tracking Alumni SMK N 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Dashboard'); ?>
<div class="container-fluid text-center">
    <div class="container mt-4 mb-5">
        <div class="row g-4 mb-2">
            <div class="col-md-4">
                <div class="card text-white" style="background-color: #003366;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-users fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalAlumni); ?></h3>
                            <p class="mb-0">ALUMNI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-briefcase fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalBekerja); ?></h3>
                            <p class="mb-0">BEKERJA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-store fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalWirausaha); ?></h3>
                            <p class="mb-0">WIRAUSAHA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-white" style="background-color: #6f42c1;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-university fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalKuliah); ?></h3>
                            <p class="mb-0">KULIAH</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white" style="background-color: #FFA500;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-user-clock fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalBelumBekerja); ?></h3>
                            <p class="mb-0">BELUM BEKERJA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-left">
                            <i class="fas fa-user-times fa-4x" style="color: #ffffff;"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="jumlahAlumni" class="mb-1"><?php echo e($totalTidakBekerja); ?></h3>
                            <p class="mb-0">TIDAK BEKERJA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container d-flex flex-column align-items-start mb-3">
            <div class="d-flex gap-3 mb-3 w-100">
                <div class="d-flex gap-2 align-items-center">
                    <label for="tahun_awal" style="font-weight: 600;">Tahun Awal :</label>
                    <input class="form-control" type="number" id="tahun_awal" value="<?php echo e(now()->year - 3); ?>" style="width: 150px;" />
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <label for="tahun_akhir" style="font-weight: 600;">Tahun Akhir :</label>
                    <input class="form-control" type="number" id="tahun_akhir" value="<?php echo e(now()->year); ?>" style="width: 150px;" />
                </div>
            </div>
            <div class="d-flex align-items-center p-2 mb-3" style="width: 100%; background-color: #ffffff; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <canvas id="alumniChart"></canvas>
            </div>
        </div>
        <div class="container d-flex flex-column align-items-start mb-3">
            <div class="d-flex gap-3 align-items-center mb-3">
                <label for="tahun" style="font-weight: 600;">Tahun :</label>
                <input class="form-control" type="number" id="tahun" value="<?php echo e(now()->year); ?>" style="width: 150px;" />
            </div>
            <div class="d-flex align-items-center p-2" style="background-color: #ffffff; width: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <canvas id="jurusanChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        async function fetchChartData(tahun) {
            try {
                const response = await fetch(`/chart-jurusan?tahun=${tahun}`);
                if (!response.ok) {
                    throw new Error('Gagal memuat data');
                }
                const data = await response.json();

                const labels = Object.keys(data);
                const chartData = labels.map(jurusan => {
                    return data[jurusan][tahun] || 0;
                });

                return {
                    labels,
                    chartData
                };
            } catch (error) {
                return {
                    labels: [],
                    chartData: []
                };
            }
        }

        async function renderChart() {
            const tahun = document.getElementById('tahun').value;
            const {
                labels,
                chartData
            } = await fetchChartData(tahun);
            if (!labels.length || !chartData.length) {
                return;
            }

            const canvas = document.getElementById('jurusanChart');
            if (!canvas) {
                return;
            }

            const ctx = canvas.getContext('2d');
            if (!ctx) {
                return;
            }

            if (window.chartInstance) {
                window.chartInstance.destroy();
            }

            window.chartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: `Jumlah Alumni Tahun ${tahun}`,
                        data: chartData,
                        backgroundColor: '#5584b0',
                        borderColor: '#003366',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jurusan'
                            }
                        }
                    }
                }
            });
        }

        document.getElementById('tahun').addEventListener('input', renderChart);

        renderChart();
    });
</script>

<script>
    let chart;

    async function fetchData(tahun_awal, tahun_akhir) {
        const response = await fetch(`/chart-data?tahun_awal=${tahun_awal}&tahun_akhir=${tahun_akhir}`);
        return response.json();
    }

    const colorMap = {
        'Bekerja': '#28a745',
        'Wirausaha': '#ffc107',
        'Pendidikan Lanjut': '#6f42c1',
        'Belum Bekerja': '#FFA500',
        'Tidak Bekerja': '#dc3545'
    };

    async function createChart() {
        const tahun_awal = document.getElementById('tahun_awal').value;
        const tahun_akhir = document.getElementById('tahun_akhir').value;
        const data = await fetchData(tahun_awal, tahun_akhir);

        const statuses = Object.keys(data);
        const years = Array.from(new Set(statuses.flatMap(status => Object.keys(data[status]))))
            .sort((a, b) => a - b);
        const datasets = statuses.map(status => ({
            label: status,
            data: years.map(year => data[status][year] || 0),
            backgroundColor: colorMap[status] || '#cccccc'
        }));

        const ctx = document.getElementById('alumniChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: datasets,
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
                            text: 'Tahun Lulus'
                        }
                    }
                }
            }
        });
    }

    async function updateChart() {
        const tahun_awal = document.getElementById('tahun_awal').value;
        const tahun_akhir = document.getElementById('tahun_akhir').value;
        const data = await fetchData(tahun_awal, tahun_akhir);

        const statuses = Object.keys(data);
        const years = Array.from(new Set(statuses.flatMap(status => Object.keys(data[status]))))
            .sort((a, b) => a - b);
        chart.data.labels = years;
        chart.data.datasets = statuses.map(status => ({
            label: status,
            data: years.map(year => data[status][year] || 0),
            backgroundColor: colorMap[status] || '#cccccc'
        }));

        chart.update();
    }

    document.getElementById('tahun_awal').addEventListener('input', updateChart);
    document.getElementById('tahun_akhir').addEventListener('input', updateChart);

    createChart();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\tracking-alumni (1)\resources\views/admin/homeadmin.blade.php ENDPATH**/ ?>