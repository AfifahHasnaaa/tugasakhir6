<?php $__env->startSection('title', 'Input Alumni - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/inputalumni.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Form Alumni'); ?>
<div class="inputalumni">
    <form id="formData" action="<?php echo e(url('alumni')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-user" style="margin-right: 8px;"></i>Profil</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Nama Lengkap Siswa<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="nama_alumni" class="form-control form-user-input" id="namaLengkap" placeholder="Masukkan nama lengkap" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                NIS<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="nis" class="form-control form-user-input" id="nis" placeholder="Masukkan NIS" required pattern="\d{4,8}" title="NIS harus berupa angka antara 4 hingga 8 digit">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                NISN<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="nisn" class="form-control form-user-input" id="nisn" placeholder="Masukkan NISN" required pattern="\d{10}" title="NISN harus berupa angka sebanyak 10 digit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tempat Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="tempat_lahir" class="form-control form-user-input" id="tempatLahir" placeholder="Masukkan tempat lahir" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tanggal Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="date" name="tanggal_lahir" class="form-control form-user-input" id="tanggalLahir" placeholder="Tanggal lahir" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Jenis Kelamin<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="jenisKelamin" name="gender">
                                <option disabled selected>Pilih jenis kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Agama<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="agama" name="agama">
                                <option disabled selected>Pilih agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Status<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="status" name="status" onchange="toggleAlasanInput()">
                                <option disabled selected>Pilih status</option>
                                <option value="Bekerja">Bekerja</option>
                                <option value="Belum Bekerja">Belum Bekerja</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Pendidikan Lanjut">Pendidikan Lanjut</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                            </select>
                        </div>
                        <div id="alasanContainer" class="mb-3" style="display: none;">
                            <label class="form-label">Alasan Belum/Tidak Bekerja</label>
                            <input type="text" name="alasan" class="form-control form-user-input" id="alasan" placeholder="contoh : ibu rumah tangga">
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-home" style="margin-right: 8px;"></i>Tempat Tinggal</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Provinsi<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="provinsi_tinggal" name="provinsi_tinggal" required="" onchange="ambil_kabupaten_tinggal()">
                                <option disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kabupaten<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="kabupaten_tinggal" name="kabupaten_tinggal" required="" onchange="ambil_kecamatan_tinggal()">
                                <option disabled selected>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kecamatan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="kecamatan_tinggal" name="kecamatan_tinggal" required="" onchange="ambil_kelurahan_tinggal()">
                                <option disabled selected>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kelurahan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="kelurahan_tinggal" required="" name="kelurahan_tinggal">
                                <option disabled selected>Pilih Kelurahan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Alamat<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <textarea class="form-control form-user-input" name="alamat_tinggal" id="alamat_tinggal" rows="3" placeholder="Masukkan alamat" required=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-home" style="margin-right: 8px;"></i>Domisili</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Provinsi<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="provinsi_domisili" name="provinsi_domisili" required="" onchange="ambil_kabupaten_domisili()">
                                <option disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kabupaten<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" name="kabupaten_domisili" id="kabupaten_domisili" required="" onchange="ambil_kecamatan_domisili()">
                                <option disabled selected>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kecamatan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" name="kecamatan_domisili" id="kecamatan_domisili" required="" onchange="ambil_kelurahan_domisili()">
                                <option disabled selected>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Kelurahan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" name="kelurahan_domisili" id="kelurahan_domisili" required="">
                                <option disabled selected>Pilih Kelurahan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Alamat<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <textarea class="form-control form-user-input" name="alamat_domisili" id="alamat_domisili" rows="3" placeholder="Masukkan alamat" required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-graduation-cap" style="margin-right: 8px;"></i>Akademik</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Tahun Masuk<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="number" class="form-control form-user-input" name="tahun_masuk" id="tahunMasuk" placeholder="Masukkan tahun masuk" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tahun Lulus<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="number" class="form-control form-user-input" name="tahun_lulus" id="tahunLulus" placeholder="Masukkan tahun lulus" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Jurusan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="jurusansmk" name="jurusan_smk">
                                <option disabled selected>Pilih jurusan SMK</option>
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
                    </div>
                </div>
                <div class="card mb-3" id="pendidikanContainer" style="display: none;">
                    <div class="card-header" id="judul"><i class="fas fa-university" style="margin-right:8px ;"></i>Pendidikan Lanjutan</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Universitas/Perguruan Tinggi</label>
                            <input type="text" class="form-control form-user-input" name="universitas" id="universitas" placeholder="Masukkan nama universitas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <input type="text" class="form-control form-user-input" name="prodi" id="prodi" placeholder="Masukkan prodi">
                        </div>
                    </div>
                </div>

                <div class="card mb-3" id="pekerjaanContainer" style="display: none;">
                    <div class="card-header" id="judul"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>Pekerjaan</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan/Usaha</label>
                            <input type="text" class="form-control form-user-input" name="nama_perusahaan" id="namaPerusahaan" placeholder="Masukkan nama perusahaan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bidang Pekerjaan/Usaha</label>
                            <input type="text" class="form-control form-user-input" name="bidang_pekerjaan" id="bidang" placeholder="Masukkan bidang pekerjaan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan/Posisi</label>
                            <input type="text" class="form-control form-user-input" name="jabatan" id="jabatan" placeholder="Masukkan jabatan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penghasilan Bulanan</label>
                            <input type="text" class="form-control form-user-input" name="penghasilan" id="penghasilan" placeholder="Masukkan penghasilan bulanan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Instansi</label>
                            <textarea class="form-control form-user-input" name="alamat_instansi" id="alamat_instansi" rows="3" placeholder="Masukkan Alamat"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="judul"><i class="fas fa-phone" style="margin-right: 8px;"></i>Kontak</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                No Telepon<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control form-user-input" name="no_telepon" id="notelpon" placeholder="Masukkan nomor telepon" required="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                No Telepon Alternatif<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control form-user-input" name="no_telepon_alternatif" id="notelponal" placeholder="Masukkan nomor telepon alternatif">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Email<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="email" class="form-control form-user-input" name="email" id="email" placeholder="Masukkan email" required="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end" style="margin-top: 24px;">
                    <button class="btn btn-secondary me-2">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputTanggalLahir = document.getElementById('tanggalLahir');
        const currentDate = inputTanggalLahir.value;

        if (currentDate) {
            const date = new Date(currentDate);
            const formattedDate = date.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            inputTanggalLahir.value = formattedDate;
        }
    });
    $(document).ready(function() {
        $('#formData').on('submit', function(e) {
            e.preventDefault();
            sendData();
        });

        function sendData() {
            var url_post = '<?php echo e(url("/formalumnistore")); ?>';
            var dataForm = {};
            var allInput = $(".form-user-input:visible");
            var isValid = true;
            $.each(allInput, function(i, val) {
                dataForm[val['name']] = $(val).val();
                if ($(val).prop('required') && !dataForm[val['name']]) {
                    isValid = false;
                    $(val).addClass('is-invalid');
                } else {
                    $(val).removeClass('is-invalid');
                }
            });

            dataForm['_token'] = '<?php echo e(csrf_token()); ?>';

            const status = $('#status').val();
            if ((status === 'Tidak Bekerja' || status === 'Belum Bekerja') && !dataForm['alasan']) {
                isValid = false;
                $('#alasanContainer input[name="alasan"]').addClass('is-invalid');
            } else {
                $('#alasanContainer input[name="alasan"]').removeClass('is-invalid');
            }

            if (status === "Pendidikan Lanjut") {
                if (!dataForm['universitas']) {
                    isValid = false;
                    $('#pendidikanContainer input[name="universitas"]').addClass('is-invalid');
                } else {
                    $('#pendidikanContainer input[name="universitas"]').removeClass('is-invalid');
                }

                if (!dataForm['prodi']) {
                    isValid = false;
                    $('#pendidikanContainer input[name="prodi"]').addClass('is-invalid');
                } else {
                    $('#pendidikanContainer input[name="prodi"]').removeClass('is-invalid');
                }
            }

            if (status === "Bekerja" || status === "Wirausaha") {
                if (!dataForm['nama_perusahaan']) {
                    isValid = false;
                    $('#pekerjaanContainer input[name="nama_perusahaan"]').addClass('is-invalid');
                } else {
                    $('#pekerjaanContainer input[name="nama_perusahaan"]').removeClass('is-invalid');
                }

                if (!dataForm['bidang_pekerjaan']) {
                    isValid = false;
                    $('#pekerjaanContainer input[name="bidang_pekerjaan"]').addClass('is-invalid');
                } else {
                    $('#pekerjaanContainer input[name="bidang_pekerjaan"]').removeClass('is-invalid');
                }

                if (!dataForm['jabatan']) {
                    isValid = false;
                    $('#pekerjaanContainer input[name="jabatan"]').addClass('is-invalid');
                } else {
                    $('#pekerjaanContainer input[name="jabatan"]').removeClass('is-invalid');
                }

                if (!dataForm['penghasilan']) {
                    isValid = false;
                    $('#pekerjaanContainer input[name="penghasilan"]').addClass('is-invalid');
                } else {
                    $('#pekerjaanContainer input[name="penghasilan"]').removeClass('is-invalid');
                }

                if (!dataForm['alamat_instansi']) {
                    isValid = false;
                    $('#pekerjaanContainer textarea[name="alamat_instansi"]').addClass('is-invalid');
                } else {
                    $('#pekerjaanContainer textarea[name="alamat_instansi"]').removeClass('is-invalid');
                }
            }

            if (!isValid) {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Silakan isi semua field yang wajib!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Gabung di Grup Telegram Alumni!',
                html: 'Klik tombol di bawah ini untuk bergabung ke grup Telegram:<br>',
                icon: 'info',
                showCancelButton: false,
                confirmButtonText: 'Gabung ke Telegram',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('https://t.me/+5KAqZsNWEShhMTdl', '_blank');

                    $.ajax(url_post, {
                        type: 'POST',
                        data: dataForm,
                        success: function(data, status, xhr) {
                            var data_str = JSON.parse(data);

                            Swal.fire({
                                title: 'Berhasil!',
                                text: data_str['pesan'],
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.href = '<?php echo e(url("/biodata")); ?>';
                            });
                        },
                        error: function(jqXHR, textStatus, errorMessage) {
                            let errorMessageText = jqXHR.responseJSON && (jqXHR.responseJSON.error || jqXHR.responseJSON.message);

                            if (errorMessageText.includes("The no telepon field must be a number. (and 1 more error)")) {
                                errorMessageText = errorMessageText.replace("The no telepon field must be a number. (and 1 more error)", "No telepon harus berupa angka. (dan 1 error lainnya)");
                            }

                            if (errorMessageText.includes("The no telepon field must be a number.")) {
                                errorMessageText = errorMessageText.replace("The no telepon field must be a number.", "No telepon harus berupa angka.");
                            }

                            if (errorMessageText.includes("The no telepon alternatif field must be a number.")) {
                                errorMessageText = errorMessageText.replace("The no telepon alternatif field must be a number.", "No telepon alternatif harus berupa angka.");
                            }

                            if (errorMessageText === "Data alumni sudah ada.") {
                                errorMessageText = "Data alumni anda sudah ada. Silakan periksa biodata anda.";
                            }

                            Swal.fire({
                                title: 'Error!',
                                text: errorMessageText,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }
    });


    function ambil_provinsi_tinggal() {
        var link = '<?php echo e(url("api/provinsi")); ?>';
        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#provinsi_tinggal').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Provinsi : ' + errorMsg);
            }
        })
    }
    ambil_provinsi_tinggal();

    function ambil_kabupaten_tinggal() {
        var prov = $('#provinsi_tinggal').val().split("||");
        var link = '<?php echo e(url("api/kota/")); ?>' + '/' + prov[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kabupaten_tinggal').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kota: ' + errorMsg);
            }
        })
    }

    function ambil_kecamatan_tinggal() {
        var kota = $('#kabupaten_tinggal').val().split("||");
        var link = '<?php echo e(url("api/kecamatan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kecamatan_tinggal').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    function ambil_kelurahan_tinggal() {
        var kota = $('#kecamatan_tinggal').val().split("||");
        var link = '<?php echo e(url("api/kelurahan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kelurahan_tinggal').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    function ambil_provinsi_domisili() {
        var link = '<?php echo e(url("api/provinsi")); ?>';
        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#provinsi_domisili').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Provinsi : ' + errorMsg);
            }
        })
    }
    ambil_provinsi_domisili();

    function ambil_kabupaten_domisili() {
        var prov = $('#provinsi_domisili').val().split("||");
        var link = '<?php echo e(url("api/kota/")); ?>' + '/' + prov[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kabupaten_domisili').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kota: ' + errorMsg);
            }
        })
    }

    function ambil_kecamatan_domisili() {
        var kota = $('#kabupaten_domisili').val().split("||");
        var link = '<?php echo e(url("api/kecamatan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kecamatan_domisili').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    function ambil_kelurahan_domisili() {
        var kota = $('#kecamatan_domisili').val().split("||");
        var link = '<?php echo e(url("api/kelurahan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kelurahan_domisili').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    function toggleAlasanInput() {
        const status = document.getElementById('status').value;
        const alasanContainer = document.getElementById('alasanContainer');
        const pendidikanContainer = document.getElementById("pendidikanContainer");
        const pekerjaanContainer = document.getElementById("pekerjaanContainer");

        pendidikanContainer.style.display = "none";
        pekerjaanContainer.style.display = "none";
        alasanContainer.style.display = "none";

        if (status === "Pendidikan Lanjut") {
            pendidikanContainer.style.display = "block";
        } else if (status === "Bekerja" || status === "Wirausaha") {
            pekerjaanContainer.style.display = "block";
        } else if (status === "Belum Bekerja" || status === "Tidak Bekerja") {
            alasanContainer.style.display = "block";
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\tracking-alumni (1)\resources\views/alumni/inputalumni.blade.php ENDPATH**/ ?>