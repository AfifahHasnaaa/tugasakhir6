@extends('layout.main')
@section('title', 'TrackMyAlumni - SMK N 1 Bantul')

@push('styles')
<link rel="stylesheet" href="{{asset('css/beranda.css')}}">
@endpush

@section('content')
<div id="welcome" class="container-fluid">
    <div class="row content-wrapper align-items-center ms-4 me-4">
        <div class="col-md-6 text-center text-md-start text-white">
            <h1 class="fw-bold">Selamat Datang</h1>
            <p>Di Website TrackMyAlumni SMK N 1 Bantul.</p>
            <p>Silahkan lakukan pendaftaran diri anda dengan klik tombol daftar jika anda belum masuk dalam list data alumni.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('asset/baground/8798188_Mesa de trabajo 1.png') }}" alt="Graduation" class="graduation-img" style="width: 600px;">
        </div>
    </div>
</div>
<div class="container-fluid text-center">
    @if($prestasi->isNotEmpty())
    <div class="container-fluid mt-3">
        <div data-aos="zoom-in" data-aos-delay="10">
            <p style="text-align: left; font-weight: 900; font-size: xx-large; color: #000; text-align: center; margin-top:24px;">Prestasi Siswa</p>
        </div>
        <div data-aos="zoom-in" data-aos-delay="10">
            <div id="successStoryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($prestasi as $key => $item)
                    <button type="button" data-bs-target="#successStoryCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($prestasi as $key => $item)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="profile-image">
                            </div>
                            <div class="col-md-9 carousel-caption text-start">
                                <h5>{{ $item->tempat }}</h5>
                                <p>{{ $item->prestasi }}</p>
                                <p class="fw-bold">{{ $item->nama }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="10">
                        <div class="progress-box">
                            <i class="fas fa-users fa-4x" style="color :#ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalAlumni }}</p>
                            <p style="color: #fff;">Total Alumni</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="20">
                        <div class="progress-box">
                            <i class="fa-solid fa-mars fa-4x" style="color: #ffffff; margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalLakiLaki }}</p>
                            <p style="color: #fff;">Laki-Laki</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="30">
                        <div class="progress-box">
                            <i class="fa-solid fa-venus fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalPerempuan }}</p>
                            <p style="color: #fff;">Perempuan</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="40">
                        <div class="progress-box">
                            <i class="fas fa-briefcase fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalBekerja }}</p>
                            <p style="color: #fff;">Bekerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="50">
                        <div class="progress-box">
                            <i class="fas fa-university fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalKuliah }}</p>
                            <p style="color: #fff;">Kuliah</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="60">
                        <div class="progress-box">
                            <i class="fas fa-store fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalWirausaha }}</p>
                            <p style="color: #fff;">Wirausaha</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="70">
                        <div class="progress-box">
                            <i class="fas fa-user-clock fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalBelumBekerja }}</p>
                            <p style="color: #fff;">Belum Bekerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div data-aos="zoom-in" data-aos-delay="80">
                        <div class="progress-box">
                            <i class="fas fa-user-times fa-4x" style="color: #ffffff;margin-top: 16px;"></i>
                            <p style="color: #fff; font-weight: 700; font-size: x-large;">{{ $totalTidakBekerja }}</p>
                            <p style="color: #fff;">Tidak Bekerja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($lowongan->isNotEmpty())
    <div class="container-fluid px-3 py-2 text-center">
        <div class="row mb-2">
            <div class="col-12 col-md-6 text-start">
                <div data-aos="zoom-in" data-aos-delay="90">
                    <p class="mb-0" style="font-weight: bold;">Info Lowongan</p>
                </div>
            </div>
            <div class="col-12 col-md-6 text-end">
                <div data-aos="zoom-in" data-aos-delay="90">
                    <a href="{{ route('lowonganguest') }}" class="selengkapnya">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div id="infolowongan" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            @foreach($lowongan as $index => $item)
            <div class="col">
                <div data-aos="zoom-in" data-aos-delay="{{ 100 + ($index * 100) }}">
                    <div class="card mb-4 rounded-3 h-100 d-flex flex-column">
                        <a href="{{ route('detaillowonganguest', $item->id_lowongan) }}" class="d-flex flex-column h-100">
                            <div class="card-body text-center flex-grow-1 d-flex flex-column justify-content-between">
                                <p class="mb-4 font-weight-bold">{{ $item->posisi }}</p>

                                <div class="d-flex justify-content-center mb-4">
                                    <img src="{{ asset('storage/logo/' . $item->logo) }}" alt="Logo {{ $item->nama_instansi }}" class="img-fluid logo">
                                </div>

                                <p class="mb-4">{{ $item->nama_instansi }}</p>

                                <p class="mb-4"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>{{ $item->syarat_pengalaman }}</p>

                                <p class="mb-0"><i class="fas fa-city" style="margin-right: 8px;"></i>{{ ucwords(strtolower($item->provinsi)) }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection