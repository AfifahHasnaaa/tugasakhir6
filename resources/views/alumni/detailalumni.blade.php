@extends('layout.main')
@section('title', 'Detail Alumni - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/detailalumni.css')}}">
@endpush
@section('content')
<div class="detailalumni">
    <div class="container-fluid d-flex justify-content-between align-items-center pt-3 pb-3">
        <div>
            <a href="" style="color: #000000;">Alumni</a>
            <span>/</span>
            <a href="#" style="color: #000000;">Detail Alumni</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-user" style="margin-right: 8px;"></i>Profil</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Nama Lengkap</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->nama_alumni }}</td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->nis }}</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->nisn }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->tanggal_lahir->format('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->gender }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->agama }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->status }}</td>
                    </tr>
                    <tr>
                        <td>Alasan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->alasan }}</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-home" style="margin-right: 8px;"></i>Alamat</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Kelurahan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kelurahan }}</td>
                    </tr>
                    <tr>
                        <td id="keterangan">Kecamatan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kabupaten }}</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->provinsi }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->alamat }}</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-home" style="margin-right: 8px;"></i>Alamat Domisili</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Kelurahan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kelurahan_domisili }}</td>
                    </tr>
                    <tr>
                        <td id="keterangan">Kecamatan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kecamatan_domisili }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->kabupaten_domisili }}</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->provinsi_domisili }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->alamat_domisili }}</td>
                    </tr>
                </table>

            </div>

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-graduation-cap" style="margin-right: 8px;"></i>Akademik</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Tahun Masuk</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->tahun_masuk }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Lulus</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->tahun_lulus }}</td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->jurusan }}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-university" style="margin-right:8px ;"></i>Pendidikan Lanjutan</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Universitas</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->perguruan_tinggi }}</td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->prodi }}</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>Pekerjaan</th>
                    </tr>
                    <tr>
                        <td id="keterangan">Nama Perusahaan/Usaha</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <td>Bidang Pekerjaan/Usaha</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->bidang_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan/Posisi</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Penghasilan Bulanan</td>
                        <td id="titikdua">:</td>
                        <td>{{ 'Rp ' . number_format($alumni->penghasilan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Instansi</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->alamat_instansi}}</td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <tr>
                        <th id="judul" colspan="3"><i class="fas fa-phone" style="margin-right: 8px;"></i>Kontak</th>
                    </tr>
                    <tr>
                        <td id="keterangan">No Telepon</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->no_telepon }}</td>
                    </tr>
                    <tr>
                        <td id="keterangan">No Telepon Alternatif</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->no_telepon_alternatif }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td id="titikdua">:</td>
                        <td>{{ $alumni->email }}</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end">
                    <div class="d-flex align-items-center me-3">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="keterangan" id="hidup">
                            <label class="form-check-label" for="hidup">Hidup</label>
                        </div>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="keterangan" id="meninggal">
                            <label class="form-check-label" for="meninggal">Meninggal</label>
                        </div>
                        <button type="button" class="btn btn-success me-3">Ubah</button>
                    </div>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection