<?php $__env->startSection('title', 'Edit Biodata - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/inputalumni.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Edit Biodata'); ?>
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
                            <input type="text" name="nama_alumni" class="form-control form-user-input" id="namaLengkap" placeholder="Masukkan nama lengkap" required="" value="<?php echo e($alumni->nama_alumni); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                NIS<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="nis" class="form-control form-user-input" id="nis" placeholder="Masukkan NIS" required="" value="<?php echo e($alumni->nis); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                NISN<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="nisn" class="form-control form-user-input" id="nisn" placeholder="Masukkan NISN" required="" value="<?php echo e($alumni->nisn); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tempat Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" name="tempat_lahir" class="form-control form-user-input" id="tempatLahir" placeholder="Masukkan tempat lahir" required="" value="<?php echo e($alumni->tempat_lahir); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tanggal Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="date" name="tanggal_lahir" class="form-control form-user-input" id="tanggalLahir" required="" value="<?php echo e($alumni->tanggal_lahir ? \Carbon\Carbon::parse($alumni->tanggal_lahir)->format('Y-m-d') : ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Jenis Kelamin<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="jenisKelamin" name="gender">
                                <option disabled selected <?php echo e(is_null($alumni->gender) ? 'selected' : ''); ?>>Pilih jenis kelamin</option>
                                <option value="L" <?php echo e($alumni->gender === 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="P" <?php echo e($alumni->gender === 'P' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Agama<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="agama" name="agama">
                                <option disabled selected <?php echo e(is_null($alumni->agama) ? 'selected' : ''); ?>>Pilih agama</option>
                                <option value="Islam" <?php echo e($alumni->agama === 'Islam' ? 'selected' : ''); ?>>Islam</option>
                                <option value="Kristen" <?php echo e($alumni->agama === 'Kristen' ? 'selected' : ''); ?>>Kristen</option>
                                <option value="Katolik" <?php echo e($alumni->agama === 'Katolik' ? 'selected' : ''); ?>>Katolik</option>
                                <option value="Hindu" <?php echo e($alumni->agama === 'Hindu' ? 'selected' : ''); ?>>Hindu</option>
                                <option value="Budha" <?php echo e($alumni->agama === 'Budha' ? 'selected' : ''); ?>>Budha</option>
                                <option value="Konghucu" <?php echo e($alumni->agama === 'Konghucu' ? 'selected' : ''); ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" required="">
                                Status<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="status" name="status" onchange="toggleAlasanInput()">
                                <option disabled selected>Pilih status</option>
                                <option value="Bekerja" <?php echo e($alumni->status === 'Bekerja' ? 'selected' : ''); ?>>Bekerja</option>
                                <option value="Belum Bekerja" <?php echo e($alumni->status === 'Belum Bekerja' ? 'selected' : ''); ?>>Belum Bekerja</option>
                                <option value="Wirausaha" <?php echo e($alumni->status === 'Wirausaha' ? 'selected' : ''); ?>>Wirausaha</option>
                                <option value="Pendidikan Lanjut" <?php echo e($alumni->status === 'Pendidikan Lanjut' ? 'selected' : ''); ?>>Pendidikan Lanjut</option>
                                <option value="Tidak Bekerja" <?php echo e($alumni->status === 'Tidak Bekerja' ? 'selected' : ''); ?>>Tidak Bekerja</option>
                            </select>
                        </div>
                        <div id="alasanContainer" class="mb-3">
                            <label class="form-label">Alasan Belum/Tidak Bekerja</label>
                            <input type="text" name="alasan" class="form-control form-user-input" id="alasan" placeholder="contoh : ibu rumah tangga" value="<?php echo e($alumni->alasan ?? ''); ?>">
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
                            <textarea class="form-control form-user-input" name="alamat_tinggal" id="alamat_tinggal" rows="3" placeholder="Masukkan alamat" required=""><?php echo e($alumni->alamat); ?></textarea>
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
                            <textarea class="form-control form-user-input" name="alamat_domisili" id="alamat_domisili" rows="3" placeholder="Masukkan alamat" required=""><?php echo e($alumni->alamat_domisili); ?></textarea>
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
                            <input type="number" class="form-control form-user-input" name="tahun_masuk" id="tahunMasuk" placeholder="Masukkan tahun masuk" required="" value="<?php echo e($alumni->tahun_masuk); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Tahun Lulus<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="number" class="form-control form-user-input" name="tahun_lulus" id="tahunLulus" placeholder="Masukkan tahun lulus" required="" value="<?php echo e($alumni->tahun_lulus); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Jurusan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select form-user-input" id="jurusansmk" name="jurusan_smk">
                                <option disabled selected <?php echo e(is_null($alumni->jurusan) ? 'selected' : ''); ?>>Pilih jurusan SMK</option>
                                <option value="Akuntansi" <?php echo e($alumni->jurusan === 'Akuntansi' ? 'selected' : ''); ?>>Akuntansi</option>
                                <option value="Layanan Perbankan Syariah" <?php echo e($alumni->jurusan === 'Layanan Perbankan Syariah' ? 'selected' : ''); ?>>Layanan Perbankan Syariah</option>
                                <option value="Bisnis Daring dan Pemasaran" <?php echo e($alumni->jurusan === 'Bisnis Daring dan Pemasaran' ? 'selected' : ''); ?>>Bisnis Daring dan Pemasaran</option>
                                <option value="Otomasisasi Perkantoran" <?php echo e($alumni->jurusan === 'Otomasisasi Perkantoran' ? 'selected' : ''); ?>>Otomasisasi Perkantoran</option>
                                <option value="Desain Komunikasi Visual" <?php echo e($alumni->jurusan === 'Desain Komunikasi Visual' ? 'selected' : ''); ?>>Desain Komunikasi Visual</option>
                                <option value="Teknik Komputer dan Jaringan" <?php echo e($alumni->jurusan === 'Teknik Komputer dan Jaringan' ? 'selected' : ''); ?>>Teknik Komputer dan Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak" <?php echo e($alumni->jurusan === 'Rekayasa Perangkat Lunak' ? 'selected' : ''); ?>>Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" id="pendidikanContainer">
                    <div class="card-header" id="judul"><i class="fas fa-university" style="margin-right:8px ;"></i>Pendidikan Lanjutan</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Universitas/Perguruan Tinggi</label>
                            <input type="text" class="form-control form-user-input" name="universitas" id="universitas" placeholder="Masukkan nama universitas" value="<?php echo e($alumni->perguruan_tinggi); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <input type="text" class="form-control form-user-input" name="prodi" id="prodi" placeholder="Masukkan prodi" value="<?php echo e($alumni->prodi); ?>">
                        </div>
                    </div>
                </div>

                <div class="card mb-3" id="pekerjaanContainer">
                    <div class="card-header" id="judul"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>Pekerjaan</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan/Usaha</label>
                            <input type="text" class="form-control form-user-input" name="nama_perusahaan" id="namaPerusahaan" placeholder="Masukkan nama perusahaan" value="<?php echo e($alumni->nama_perusahaan); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bidang Pekerjaan/Usaha</label>
                            <input type="text" class="form-control form-user-input" name="bidang_pekerjaan" id="bidang" placeholder="Masukkan bidang pekerjaan" value="<?php echo e($alumni->bidang_pekerjaan); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan/Posisi</label>
                            <input type="text" class="form-control form-user-input" name="jabatan" id="jabatan" placeholder="Masukkan jabatan" value="<?php echo e($alumni->jabatan); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penghasilan Bulanan</label>
                            <input type="text" class="form-control form-user-input" name="penghasilan" id="penghasilan" placeholder="Masukkan penghasilan bulanan" value="<?php echo e($alumni->penghasilan); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Instansi</label>
                            <textarea class="form-control form-user-input" name="alamat_instansi" id="alamat_instansi" rows="3" placeholder="Masukkan Alamat"><?php echo e($alumni->alamat_instansi); ?></textarea>
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
                            <input type="text" class="form-control form-user-input" name="no_telepon" id="notelpon" placeholder="Masukkan nomor telepon" required="" value="<?php echo e($alumni->no_telepon); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telepon Alternatif</label>
                            <input type="text" class="form-control form-user-input" name="no_telepon_alternatif" id="notelponal" placeholder="Masukkan nomor telepon alternatif" value="<?php echo e($alumni->no_telepon_alternatif); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Email<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="email" class="form-control form-user-input" name="email" id="email" placeholder="Masukkan email" required="" value="<?php echo e($alumni->email); ?>">
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
    $(document).ready(function() {
        $('#formData').on('submit', function(e) {
            e.preventDefault();
            sendData();
        });

        function sendData() {
            var url_post = '<?php echo e(url("/editbiodataupdate")); ?>';
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
                title: 'Berhasil',
                text: 'Sedang memproses...',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            });

            $.ajax(url_post, {
                type: 'POST',
                data: dataForm,
                success: function(data, status, xhr) {
                    var data_str = data;

                    Swal.fire({
                        title: 'Berhasil!',
                        text: data_str['pesan'],
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo e(route('biodata')); ?>";
                        }
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


    function ambil_provinsi_tinggal(selectedProvinsiName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/provinsi")); ?>';
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#provinsi_tinggal').html(data);

                    if (selectedProvinsiName) {
                        $('#provinsi_tinggal option').filter(function() {
                            return $(this).text().trim() == selectedProvinsiName;
                        }).prop('selected', true);

                        resolve($('#provinsi_tinggal').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Provinsi: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kabupaten_tinggal(selectedProvinsiValue, selectedKabupatenName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kota/")); ?>' + '/' + selectedProvinsiValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kabupaten_tinggal').html(data);

                    if (selectedKabupatenName) {
                        $('#kabupaten_tinggal option').filter(function() {
                            return $(this).text().trim() == selectedKabupatenName;
                        }).prop('selected', true);

                        resolve($('#kabupaten_tinggal').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kabupaten: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kecamatan_tinggal(selectedKabupatenValue, selectedKecamatanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kecamatan/")); ?>' + '/' + selectedKabupatenValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kecamatan_tinggal').html(data);

                    if (selectedKecamatanName) {
                        $('#kecamatan_tinggal option').filter(function() {
                            return $(this).text().trim() == selectedKecamatanName;
                        }).prop('selected', true);

                        resolve($('#kecamatan_tinggal').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kecamatan: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kelurahan_tinggal(selectedKecamatanValue, selectedKelurahanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kelurahan/")); ?>' + '/' + selectedKecamatanValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kelurahan_tinggal').html(data);

                    if (selectedKelurahanName) {
                        $('#kelurahan_tinggal option').filter(function() {
                            return $(this).text().trim() == selectedKelurahanName;
                        }).prop('selected', true);

                        resolve();
                    } else {
                        resolve();
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kelurahan: ' + errorMsg);
                }
            });
        });
    }

    ambil_provinsi_tinggal('<?php echo e($alumni->provinsi); ?>')
        .then(selectedProvinsiValue => ambil_kabupaten_tinggal(selectedProvinsiValue, '<?php echo e($alumni->kabupaten); ?>'))
        .then(selectedKabupatenValue => ambil_kecamatan_tinggal(selectedKabupatenValue, '<?php echo e($alumni->kecamatan); ?>'))
        .then(selectedKecamatanValue => ambil_kelurahan_tinggal(selectedKecamatanValue, '<?php echo e($alumni->kelurahan); ?>'))
        .catch(error => console.log(error));

    function resetAlamatTinggal() {
        $('#alamat_tinggal').val('');
    }

    $('#provinsi_tinggal').change(function() {
        var selectedProvinsiValue = $(this).val();
        resetAlamatTinggal();

        $('#kabupaten_tinggal').html('<option disabled selected>Pilih Kabupaten</option>');
        $('#kecamatan_tinggal').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan_tinggal').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedProvinsiValue) {
            ambil_kabupaten_tinggal(selectedProvinsiValue);
        }
    });

    $('#kabupaten_tinggal').change(function() {
        var selectedKabupatenValue = $(this).val();
        resetAlamatTinggal();

        $('#kecamatan_tinggal').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan_tinggal').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKabupatenValue) {
            ambil_kecamatan_tinggal(selectedKabupatenValue);
        }
    });

    $('#kecamatan_tinggal').change(function() {
        var selectedKecamatanValue = $(this).val();
        resetAlamatTinggal();

        $('#kelurahan_tinggal').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKecamatanValue) {
            ambil_kelurahan_tinggal(selectedKecamatanValue);
        }
    });

    $('#kelurahan_tinggal').change(function() {
        var selectedKelurahanValue = $(this).val();
        resetAlamatTinggal();
    });

    function ambil_provinsi_domisili(selectedProvinsiName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/provinsi")); ?>';
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#provinsi_domisili').html(data);

                    if (selectedProvinsiName) {
                        $('#provinsi_domisili option').filter(function() {
                            return $(this).text().trim() == selectedProvinsiName;
                        }).prop('selected', true);

                        resolve($('#provinsi_domisili').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Provinsi: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kabupaten_domisili(selectedProvinsiValue, selectedKabupatenName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kota/")); ?>' + '/' + selectedProvinsiValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kabupaten_domisili').html(data);

                    if (selectedKabupatenName) {
                        $('#kabupaten_domisili option').filter(function() {
                            return $(this).text().trim() == selectedKabupatenName;
                        }).prop('selected', true);

                        resolve($('#kabupaten_domisili').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kabupaten: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kecamatan_domisili(selectedKabupatenValue, selectedKecamatanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kecamatan/")); ?>' + '/' + selectedKabupatenValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kecamatan_domisili').html(data);

                    if (selectedKecamatanName) {
                        $('#kecamatan_domisili option').filter(function() {
                            return $(this).text().trim() == selectedKecamatanName;
                        }).prop('selected', true);

                        resolve($('#kecamatan_domisili').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kecamatan: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kelurahan_domisili(selectedKecamatanValue, selectedKelurahanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '<?php echo e(url("api/kelurahan/")); ?>' + '/' + selectedKecamatanValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kelurahan_domisili').html(data);

                    if (selectedKelurahanName) {
                        $('#kelurahan_domisili option').filter(function() {
                            return $(this).text().trim() == selectedKelurahanName;
                        }).prop('selected', true);

                        resolve();
                    } else {
                        resolve();
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kelurahan: ' + errorMsg);
                }
            });
        });
    }

    ambil_provinsi_domisili('<?php echo e($alumni->provinsi_domisili); ?>')
        .then(selectedProvinsiValue => ambil_kabupaten_domisili(selectedProvinsiValue, '<?php echo e($alumni->kabupaten_domisili); ?>'))
        .then(selectedKabupatenValue => ambil_kecamatan_domisili(selectedKabupatenValue, '<?php echo e($alumni->kecamatan_domisili); ?>'))
        .then(selectedKecamatanValue => ambil_kelurahan_domisili(selectedKecamatanValue, '<?php echo e($alumni->kelurahan_domisili); ?>'))
        .catch(error => console.log(error));

    function resetAlamatDomisili() {
        $('#alamat_domisili').val('');
    }

    $('#provinsi_domisili').change(function() {
        var selectedProvinsiValue = $(this).val();
        resetAlamatDomisili();

        $('#kabupaten_domisili').html('<option disabled selected>Pilih Kabupaten</option>');
        $('#kecamatan_domisili').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan_domisili').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedProvinsiValue) {
            ambil_kabupaten_domisili(selectedProvinsiValue);
        }
    });

    $('#kabupaten_domisili').change(function() {
        var selectedKabupatenValue = $(this).val();
        resetAlamatDomisili();

        $('#kecamatan_domisili').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan_domisili').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKabupatenValue) {
            ambil_kecamatan_domisili(selectedKabupatenValue);
        }
    });

    $('#kecamatan_domisili').change(function() {
        var selectedKecamatanValue = $(this).val();
        resetAlamatDomisili();

        $('#kelurahan_domisili').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKecamatanValue) {
            ambil_kelurahan_domisili(selectedKecamatanValue);
        }
    });

    $('#kelurahan_domisili').change(function() {
        var selectedKelurahanValue = $(this).val();
        resetAlamatDomisili();
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\tracking-alumni (1)\resources\views/alumni/editbiodata.blade.php ENDPATH**/ ?>