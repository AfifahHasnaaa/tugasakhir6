@extends('layout.adminLayout')
@section('title','Edit Biodata - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/biodata.css')}}">
@endpush
@section('konten')
@section('judul','Edit Biodata')
<div class="biodata">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-user" style="margin-right: 8px;"></i>Profil</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">
                                Nama Lengkap Siswa<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan nama lengkap" required="">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">
                                NIS<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS" required="">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">
                                NISN<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control" id="nisn" placeholder="Masukkan NISN" required="">
                        </div>
                        <div class="mb-3">
                            <label for="tempatLahir" class="form-label">
                                Tempat Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control" id="tempatLahir" placeholder="Masukkan tempat lahir" required="">
                        </div>
                        <div class="mb-3">
                            <label for="tanggalLahir" class="form-label">
                                Tanggal Lahir<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="date" class="form-control" id="tanggalLahir" required="">
                        </div>
                        <div class="mb-3">
                            <label for="jenisKelamin" class="form-label" required="">
                                Jenis Kelamin<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="jenisKelamin">
                                <option disabled selected>Pilih jenis kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label" required="">
                                Agama<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="agama">
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
                            <label for="status" class="form-label" required="">
                                Status<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="status">
                                <option disabled selected>Pilih status</option>
                                <option value="Bekerja">Bekerja</option>
                                <option value="BelumBekerja">Belum Bekerja</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Pendidikan Lanjut">Pendidikan Lanjut</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Tidak Bekerja</label>
                            <input type="text" class="form-control" id="tempatLahir" placeholder="contoh : ibu rumah tangga">
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-home" style="margin-right: 8px;"></i>Tempat Tinggal</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="provinsi" class="form-label" required="">
                                Provinsi<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="provinsi">
                                <option disabled selected>Pilih provinsi</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label" required="">
                                Kabupaten<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kabupaten">
                                <option disabled selected>Pilih kabupaten</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Bogor">Bogor</option>
                                <option value="Bekasi">Bekasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label" required="">
                                Kecamatan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kecamatan">
                                <option disabled selected>Pilih kecamatan</option>
                                <option value="Cibeunying">Cibeunying</option>
                                <option value="Cibiru">Cibiru</option>
                                <option value="Cimahi">Cimahi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label" required="">
                                Kelurahan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kelurahan">
                                <option disabled selected>Pilih kelurahan</option>
                                <option value="Cibeunying">Cibeunying</option>
                                <option value="Cibiru">Cibiru</option>
                                <option value="Cimahi">Cimahi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                Alamat<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-home" style="margin-right: 8px;"></i>Domisili</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="provinsi" class="form-label" required="">
                                Provinsi<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="provinsi">
                                <option disabled selected>Pilih provinsi</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label" required="">
                                Kabupaten<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kabupaten">
                                <option disabled selected>Pilih kabupaten</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Bogor">Bogor</option>
                                <option value="Bekasi">Bekasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label" required="">
                                Kecamatan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kecamatan">
                                <option disabled selected>Pilih kecamatan</option>
                                <option value="Cibeunying">Cibeunying</option>
                                <option value="Cibiru">Cibiru</option>
                                <option value="Cimahi">Cimahi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label" required="">
                                Kelurahan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="kelurahan">
                                <option disabled selected>Pilih kelurahan</option>
                                <option value="Cibeunying">Cibeunying</option>
                                <option value="Cibiru">Cibiru</option>
                                <option value="Cimahi">Cimahi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                Alamat<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat" required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-graduation-cap" style="margin-right: 8px;"></i>Akademik</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tahunMasuk" class="form-label">
                                Tahun Masuk<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="number" class="form-control" id="tahunMasuk" placeholder="Masukkan tahun masuk" required="">
                        </div>
                        <div class="mb-3">
                            <label for="tahunLulus" class="form-label">
                                Tahun Lulus<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="number" class="form-control" id="tahunLulus" placeholder="Masukkan tahun lulus" required="">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">
                                Jurusan<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <select class="form-select" id="jurusansmk">
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
                            <label for="universitas" class="form-label">Nama Universitas/Perguruan Tinggi</label>
                            <input type="text" class="form-control" id="universitas" placeholder="Masukkan nama universitas">
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" placeholder="Masukkan prodi">
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" id="judul"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>Pekerjaan</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaPerusahaan" class="form-label">Nama Perusahaan/Usaha</label>
                            <input type="text" class="form-control" id="namaPerusahaan" placeholder="Masukkan nama perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="bidang" class="form-label">Bidang Pekerjaan/Usaha</label>
                            <input type="text" class="form-control" id="bidang" placeholder="Masukkan bidang pekerjaan">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan/Posisi</label>
                            <input type="text" class="form-control" id="jabatan" placeholder="Masukkan jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="penghasilan" class="form-label">Penghasilan Bulanan</label>
                            <input type="text" class="form-control" id="penghasilan" placeholder="Masukkan penghasilan bulanan">
                        </div>
                        <div class="mb-3">
                            <label for="alamatkerja" class="form-label">Alamat Instansi</label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat instansi"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="judul"><i class="fas fa-phone" style="margin-right: 8px;"></i>Kontak</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="notelpon" class="form-label">
                                No Telepon<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="text" class="form-control" id="notelpon" placeholder="Masukkan nomor telepon" required="">
                        </div>
                        <div class="mb-3">
                            <label for="notelponalternatif" class="form-label">No Telepon Alternatif</label>
                            <input type="text" class="form-control" id="notelpon" placeholder="Masukkan nomor telepon alternatif">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email<span style="color: red; font-weight:bold">*</span>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email" required="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end" style="margin-top: 24px;">
                    <button class="btn btn-secondary me-2">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection