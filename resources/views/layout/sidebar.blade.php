@extends('layout.main')
@section('title','Profil')

@push('styles')
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
@endpush

@section('content')
<div class="profil">
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-picture">
                <img src="{{asset('asset/profil/profil.png')}}" alt="Admin">
                <div class="camera-icon">
                    <i class='bx bx-camera icon'><a href=""></a></i>
                </div>
            </div>
            <h3>Admin</h3>
            <p>12 September 2023</p>
        </div>
        <ul class="menu">

            <li class="{{ request()->routeIs(['profile', 'editprofile']) ? 'active' : '' }}">
                <a href="{{ route('profile') }}">
                    <span class="icon"><i class='bx bx-user icon'></i></span>Profil
                </a>
            </li>
            <li class="{{ request()->routeIs(['prestasi.index','tambahprestasi','editprestasi']) ? 'active' : '' }}">
                <a href="{{ route('prestasi.index') }}">
                    <span class="icon"><i class='bx bx-medal icon'></i></span>Prestasi Alumni
                </a>
            </li>
            <li class="{{ request()->routeIs('keluar') ? 'active' : '' }}">
                <a href="{{ route('keluar') }}" onclick="event.preventDefault(); confirmLogout();">
                    <span class="icon"><i class='bx bx-log-out icon'></i></span>Keluar
                </a>
            </li>
        </ul>
    </div>
    <div class="konten">
        @yield('konten')
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda akan keluar dari website ini",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Keluar",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Keluar",
                    text: "Klik oke untuk ke halaman awal",
                    icon: "success"
                }).then(() => {
                    window.location.href = "{{ route('keluar') }}";
                });

            }
        });
    }
</script>
@endpush