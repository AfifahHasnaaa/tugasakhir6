@extends('layout.adminLayout')
@section('title','Profil - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/profilalumni.css')}}">
@endpush
@section('konten')
@section('judul','Profil Admin')
<div class="profile-container">
    <div class="profile-content">
        <div class="profile-info">
            <p class="label">Nama Pengguna</p>
            <p>{{ Auth::guard('admin')->user()->username }}</p>
        </div>
        <div class="profile-info">
            <p class="label">Email</p>
            <p>{{ Auth::guard('admin')->user()->email }}</p>
        </div>
        <div class="profile-info">
            <p class="label">Kata Sandi</p>
            <p>{{ str_repeat('*', 8) }}</p>
        </div>
        <div class="profile-info">
            <p class="label">Tanggal Buat</p>
            <p>{{ Auth::guard('admin')->user()->tanggal_buat->translatedformat('d F Y') }}</p>
        </div>
        <div class="profile-info">
            <p class="label">Terakhir Login</p>
            <p>{{ Auth::guard('admin')->user()->tanggal_login->translatedformat('d F Y') }}</p>
        </div>
    </div>
    <div class="profile-footer">
        <a href="{{ route('editprofileadmin') }}" class="btn-ubah">Edit Profil</a>
    </div>
</div>
@endsection