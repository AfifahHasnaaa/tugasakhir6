<?php $__env->startSection('title','Tambah Lowongan - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/tambahlowongan.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Tambah Lowongan'); ?>
<div class="tambahlowongan">
    <div class="card-body">
        <form id="formData" enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
                <label for="namaInstansi" class="col-sm-3 col-form-label">Nama Instansi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="namaInstansi" name="nama_instansi" placeholder="Masukkan nama instansi" required="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsiInstansi" class="col-sm-3 col-form-label">Deskripsi Instansi</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="deskripsiInstansi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi instansi" required=""></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="posisiKerja" class="col-sm-3 col-form-label">Posisi Kerja</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="posisiKerja" name="posisi" placeholder="Masukkan posisi kerja" required="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="pengalaman" class="col-sm-3 col-form-label">Pengalaman</label>
                <div class="col-sm-9">
                    <select class="form-select form-user-input" id="pengalaman" name="syarat_pengalaman" required="">
                        <option value="" disabled selected>Pilih syarat pengalaman</option>
                        <option value="Tanpa Pengalaman">Tanpa Pengalaman</option>
                        <option value="1-2 Tahun">1 - 2 Tahun</option>
                        <option value="3-4 Tahun">3 - 4 Tahun</option>
                        <option value="5 Tahun Lebih">5 Tahun Lebih</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jenisKelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select class="form-select form-user-input" id="jenisKelamin" name="gender" required="">
                        <option value="" disabled selected>Pilih jenis kelamin</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki/Perempuan">Laki-Laki/Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Besaran Gaji</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-user-input" type="radio" name="gaji" id="umr" value="UMR">
                        <label class="form-check-label" for="umr">UMR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-user-input" type="radio" name="gaji" id="kompetitif" value="Kompetitif">
                        <label class="form-check-label" for="kompetitif">Kompetitif</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gaji" id="gaji-sendiri" value="Gaji Sendiri">
                        <label class="form-check-label" for="gaji-sendiri">Isi Gaji Sendiri</label>
                        <div class="form-group" id="input-gaji-sendiri" style="display: none;">
                            <input type="number" class="form-control form-user-input"
                                placeholder="Masukkan jumlah gaji" id="jumlah-gaji-sendiri">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <div class="lokasi">
                        <div class="form-item mb-3">
                            <label for="provinsi" style="width: 144px;">Provinsi</label>
                            <select class="form-select form-user-input" id="provinsi" name="provinsi" required="" onchange="ambil_kabupaten()">
                                <option disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kabupaten" style="width: 144px;">Kabupaten</label>
                            <select class="form-select form-user-input" id="kabupaten" name="kabupaten" required="" onchange="ambil_kecamatan()">
                                <option disabled selected>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kecamatan" style="width: 144px;">Kecamatan</label>
                            <select class="form-select form-user-input" id="kecamatan" name="kecamatan" required="" onchange="ambil_kelurahan()">
                                <option disabled selected>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kelurahan" style="width: 144px;">Kelurahan</label>
                            <select class="form-select form-user-input" id="kelurahan" name="kelurahan" required="">
                                <option disabled selected>Pilih Kelurahan</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="alamat" style="width: 144px;">Alamat</label>
                            <input class="form-control form-user-input" type="text" name="alamat" id="alamat" placeholder="Alamat Instansi" required="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="syarat" class="col-sm-3 col-form-label">Syarat</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="syarat" name="syarat_pekerjaan" rows="4" cols="50" placeholder="Masukkan syarat" required=""></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsiPekerjaan" class="col-sm-3 col-form-label">Deskripsi Pekerjaan</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="deskripsiPekerjaan" name="deskripsi_pekerjaan" rows="4" cols="50" placeholder="Masukkan deskripsi pekerjaan" required=""></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="kontak" class="col-sm-3 col-form-label">Kontak</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="kontak" name="no_kontak" placeholder="Masukkan kontak" required="">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control form-user-input" id="email" name="email" placeholder="Masukkan email" required="" autocomplete="on">
                </div>
            </div>
            <div class="row mb-3">
                <label for="logoInstansi" class="col-sm-3 col-form-label">Logo Instansi</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control form-user-input" name="logo" id="logoInstansi">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="button" class="btn btn-secondary me-2">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#formData').on('submit', function(e) {
            e.preventDefault();
            if (!$('input[name="gaji"]:checked').val()) {
                Swal.fire('Peringatan!', 'Silakan pilih besaran gaji!', 'warning');
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data akan diproses!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, kirim!',
                cancelButtonText: 'Tidak, batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    sendData();
                }
            });
        });

        function sendData() {
            var url_post = '<?php echo e(url("api/lowongan/input")); ?>';
            var formData = new FormData();

            formData.append('id_user_admin', '<?php echo e(Auth::guard("admin")->id()); ?>');

            var selectedGaji = document.querySelector('input[name="gaji"]:checked');
            if (selectedGaji.value === 'Gaji Sendiri') {
                var jumlahGaji = document.getElementById('jumlah-gaji-sendiri').value;
                formData.append('gaji', jumlahGaji);
            } else {
                formData.append('gaji', selectedGaji.value);
            }

            var allInput = $(".form-user-input");
            $.each(allInput, function(i, val) {
                if (val.type === 'file' && val.files.length > 0) {
                    formData.append(val.name, val.files[0]);
                } else if (val.name !== 'gaji') {
                    formData.append(val.name, val.value);
                }
            });

            $.ajax({
                url: '<?php echo e(url("api/lowongan/input")); ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Jika berhasil, tampilkan notifikasi dan redirect
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.pesan,
                        icon: 'success',
                    }).then(() => {
                        // Redirect ke halaman detail lowongan
                        window.location.href = `/detaillowonganadmin/${response.id_lowongan}`;
                    });
                },
                error: function(jqXHR) {
                    // Jika gagal, tampilkan pesan error
                    Swal.fire({
                        title: 'Error!',
                        text: jqXHR.responseJSON?.pesan || 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error',
                    });
                }
            });
        }
    });


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
    ambil_provinsi();

    function ambil_kabupaten() {
        var prov = $('#provinsi').val().split("||");
        var link = '<?php echo e(url("api/kota/")); ?>' + '/' + prov[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kabupaten').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kota: ' + errorMsg);
            }
        })
    }

    function ambil_kecamatan() {
        var kota = $('#kabupaten').val().split("||");
        var link = '<?php echo e(url("api/kecamatan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kecamatan').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    function ambil_kelurahan() {
        var kota = $('#kecamatan').val().split("||");
        var link = '<?php echo e(url("api/kelurahan/")); ?>' + '/' + kota[0];

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#kelurahan').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Kecamatan: ' + errorMsg);
            }
        })
    }

    document.querySelectorAll('input[name="gaji"]').forEach((elem) => {
        elem.addEventListener('change', function() {
            const inputGajiSendiri = document.getElementById('input-gaji-sendiri');
            const jumlahGajiSendiri = document.getElementById('jumlah-gaji-sendiri');

            if (this.value === 'Gaji Sendiri') {
                inputGajiSendiri.style.display = 'block'; // Tampilkan input gaji manual
                jumlahGajiSendiri.setAttribute('name', 'gaji'); // Tambahkan atribut name agar terkirim
                jumlahGajiSendiri.required = true; // Jadikan wajib diisi
            } else {
                inputGajiSendiri.style.display = 'none'; // Sembunyikan input manual
                jumlahGajiSendiri.removeAttribute('name'); // Hapus name agar tidak bentrok
                jumlahGajiSendiri.required = false; // Hapus wajib input
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/admin/tambahlowongan.blade.php ENDPATH**/ ?>