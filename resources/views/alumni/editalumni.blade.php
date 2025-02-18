@extends('layout.main')
@section('title', 'Input Alumni - SMKN 1 Bantul')

@push('styles')
<link rel="stylesheet" href="{{asset('css/inputalumni.css')}}">
@endpush

@section('content')
<div class="inputalumni">
    <div class="container-fluid mt-4">
        <div class="breadcrumb d-flex justify-content-between">
            <div>
                <a href="" style="color: #000000; float:left;">Alumni</a><span>/</span><a href="#" style="color: #000000;">Edit Alumni</a>
            </div>
        </div>
        <form id="formData" action="{{ url('alumni') }}" method="POST">
            @csrf
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
                                <input type="text" name="nis" class="form-control form-user-input" id="nis" placeholder="Masukkan NIS" required="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    NISN<span style="color: red; font-weight:bold">*</span>
                                </label>
                                <input type="text" name="nisn" class="form-control form-user-input" id="nisn" placeholder="Masukkan NISN" required="">
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
                                <input type="date" name="tanggal_lahir" class="form-control form-user-input" id="tanggalLahir" required="">
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
                                <select class="form-select form-user-input" id="status" name="status">
                                    <option disabled selected>Pilih status</option>
                                    <option value="Bekerja">Bekerja</option>
                                    <option value="BelumBekerja">Belum Bekerja</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Pendidikan Lanjut">Pendidikan Lanjut</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alasan Tidak Bekerja</label>
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
                                    <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                                    <option value="Otomasisasi Perkantoran">Otomasisasi Perkantoran</option>
                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
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

                    <div class="card mb-3">
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
                                <textarea class="form-control form-user-input" name="alamat_instansi" id="alamat" rows="3" placeholder="Masukkan alamat instansi"></textarea>
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
                                <label class="form-label">No Telepon Alternatif</label>
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
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        $('#formData').on('submit', function(e) {
            e.preventDefault();
            sendData();
        })

        function sendData() {
            var url_post = '{{ url("api/alumni/input") }}';

            var dataForm = {};
            var allInput = $(".form-user-input");

            $.each(allInput, function(i, val) {
                dataForm[val['name']] = val['value'];
            });

            $.ajax(url_post, {
                type: 'POST',
                data: dataForm,
                success: function(data, status, xhr) {
                    var data_str = JSON.parse(data);

                    alert(data_str['pesan']);
                },
                error: function(jqXHR, textStatus, errorMessage) {
                    alert('Error : ' + jqXHR.responseJSON.message);
                }
            })
        }
    })

    function ambil_provinsi_tinggal() {
        var link = '{{ url("api/provinsi") }}';
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
        var link = '{{ url("api/kota/") }}' + '/' + prov[0];

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
        var link = '{{ url("api/kecamatan/") }}' + '/' + kota[0];

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
        var link = '{{ url("api/kelurahan/") }}' + '/' + kota[0];

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
        var link = '{{ url("api/provinsi") }}';
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
        var link = '{{ url("api/kota/") }}' + '/' + prov[0];

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
        var link = '{{ url("api/kecamatan/") }}' + '/' + kota[0];

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
        var link = '{{ url("api/kelurahan/") }}' + '/' + kota[0];

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
</script>
@endpush