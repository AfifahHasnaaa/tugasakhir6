@extends('layout.adminLayout')
@section('title','Edit Profil - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/editprofil.css')}}">
@endpush
@section('konten')
@section('judul','Edit Profil Admin')
<div class="edit-container">
    <div class="edit-menu">
        <a href="{{ route('editprofileadmin') }}" class="menu-item active">Ubah username</a>
        <a href="{{ route('editpasswordadmin') }}" class="menu-item">Ubah kata sandi</a>
        <a href="{{ route('profileadmin') }}" class="close" title="Kembali">
            <i class="bx bx-x"></i>
        </a>
    </div>
    <div class="edit-content">
        <form action="{{ route('updateUsernameAdmin') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-3">
                <label for="username" class="form-label">Username Baru</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username baru" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi" required>
                    <button type="button" id="togglePassword" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>

            </div>

            <div class="d-flex justify-content-end m-4 me-0">
                <button type="submit" class="simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('profileadmin') }}";
        }
    });
</script>
@endif
<script>
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script>
@endpush