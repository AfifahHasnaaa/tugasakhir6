<link rel="stylesheet" href="{{asset('css/header.css')}}">
<div class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://home.amikom.ac.id/">
            <img src="{{ asset('asset/logo/Logo_Amikom.png') }}">
        </a>
        <a class="navbar-brand" href="#">
            <img src="{{ asset('asset/logo/SMK_Negeri_1_Bantul.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dataalumnii') ? 'active' : '' }}" href="{{ url('dataalumnii') }}">Data Alumni</a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                    <a class="nav-link {{ request()->is('inputalumni') ? 'active' : '' }}" href="{{ url('inputalumni') }}">Form Alumni</a>
                    @else
                    <a class="nav-link" href="{{ url('login') }}">Form Alumni</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is(['lowongann', 'detaillowongann/*']) ? 'active' : '' }}" href="{{ route('lowonganguest') }}">Lowongan Kerja</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ url('tentang') }}">Info</a>
                </li>
            </ul>
            <ul class="nav ms-auto col-12 col-lg-auto mb-md-0 text-end">
                <li>
                    <div class="user-actions">
                        <button class="masuk">
                            <a href="{{ url('login') }}">Masuk</a>
                        </button>
                        <button class="daftar">
                            <a href="{{ route('register') }}">Daftar</a>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>