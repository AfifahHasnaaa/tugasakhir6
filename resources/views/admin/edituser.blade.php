@extends('layout.adminLayout')
@section('title', 'Edit Data User')

@section('konten')
<div class="container">
    <h2>Edit Data User</h2>
    <form method="POST" action="{{ route('adminuser.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url('/adminuser') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
