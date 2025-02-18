<?php $__env->startSection('title', 'Data Alumni - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/dataalumni.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Data Alumni'); ?>
<div class="dataalumni">
    <form id="filterForm">
        <div class="row align-items-end">
            <div class="col-sm-12 col-md-3 mb-3">
                <label for="nama_alumni" class="form-label">Cari Nama</label>
                <input type="text" id="nama_alumni" class="form-control" placeholder="Cari Nama Alumni">
            </div>

            <div class="col-sm-12 col-md-3 mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select id="jurusan" class="form-select">
                    <option value="">Pilih Jurusan</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Layanan Perbankan Syariah">Layanan Perbankan Syariah</option>
                    <option value="Manajemen Perkantoran">Manajemen Perkantoran</option>
                    <option value="Bisnis Ritel">Bisnis Ritel</option>
                    <option value="Bisnis Digital">Bisnis Digital</option>
                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                </select>
            </div>

            <div class="col-sm-12 col-md-2 mb-3">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input type="number" id="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
            </div>

            <div class="col-sm-12 col-md-2 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-select">
                    <option value="">Pilih Status</option>
                    <option value="Bekerja">Bekerja</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Pendidikan Lanjut">Pendidikan Lanjut</option>
                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                    <option value="Belum Bekerja">Belum Bekerja</option>
                </select>
            </div>

            <div class="col-sm-12 col-md-2 mb-3">
                <label for="entriesPerPage" class="form-label">Entries per page</label>
                <select id="entriesPerPage" class="form-select">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table id="data-list" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function ambil_data(kode = '') {
        var link = kode === '' ? '<?php echo e(url("api/alumni/all")); ?>' : '<?php echo e(url("api/alumni/kode/")); ?>' + '/' + kode;

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                resetTable();
                var objData = JSON.parse(data);
                var dataTable = '';
                $.each(objData, function(key, value) {
                    dataTable += '<tr>';
                    dataTable += '<td>' + (key + 1) + '</td>';
                    dataTable += '<td>' + value.nama_alumni.toUpperCase() + '</td>';
                    dataTable += '<td>' + value.jurusan.toUpperCase() + '</td>';
                    dataTable += '<td>' + value.tahun_lulus + '</td>';
                    dataTable += '<td>' + value.status.toUpperCase() + '</td>';

                    if (value.status === 'Pendidikan Lanjut') {
                        dataTable += '<td>' + value.perguruan_tinggi.toUpperCase() + '</td>';
                    } else if (value.status === 'Bekerja' || value.status === 'Wirausaha') {
                        dataTable += '<td>' + value.nama_perusahaan.toUpperCase() + '</td>';
                    } else if (value.status === 'Tidak Bekerja' || value.status === 'Belum Bekerja') {
                        dataTable += '<td>' + value.alasan.toUpperCase() + '</td>';
                    }
                    dataTable += '</tr>';
                });

                $("#data-list").append(dataTable);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error Pengambilan Data: ' + errorMsg,
                });
            }
        });
    }

    function resetTable() {
        $("#data-list").html("<thead> <tr> <th>No</th> <th>Nama</th> <th>Jurusan</th> <th>Tahun Lulus</th> <th>Status</th> <th>Keterangan</th>  </tr> </thead>");
    }
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

<script>
    var url = '<?php echo e(url("api/alumni/dataTable")); ?>';
    var tabel = $("#data-list").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: url,
            data: function(d) {
                d.jurusan = $("#jurusan").val();
                d.tahun_lulus = $("#tahun_lulus").val();
                d.status = $("#status").val();
                d.entriesPerPage = $("#entriesPerPage").val();
                d.nama_alumni = $("#nama_alumni").val();
            },
            error: function(xhr, error, thrown) {
                console.error("Error:", error);
                console.error("Response:", xhr.responseText);
                alert("Terjadi kesalahan saat memuat data.");
            }
        },
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100],
        "order": [
            [1, "asc"]
        ],
        "dom": 't<"row"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
        "responsive": false,
        "columnDefs": [{
            "targets": 0,
            "render": function(data, type, row, meta) {
                var start = tabel.page.info().start;
                return start + meta.row + 1;
            }
        }]
    });

    $("#entriesPerPage").on('change', function() {
        var entries = $(this).val();
        tabel.page.len(entries).draw();
    });

    $("#jurusan, #tahun_lulus, #status, #entriesPerPage").on('change', function() {
        tabel.ajax.reload();
    });

    $("#tahun_lulus").on('input', function() {
        clearTimeout(this.delay);
        this.delay = setTimeout(function() {
            tabel.ajax.reload();
        }.bind(this), 500);
    });

    $("#nama_alumni").on('input', function() {
        clearTimeout(this.delay);
        this.delay = setTimeout(function() {
            tabel.ajax.reload();
        }.bind(this), 500);
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/alumni/dataalumni.blade.php ENDPATH**/ ?>