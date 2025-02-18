@extends('layout.alumniLayout')
@section('title', 'Edit Profil - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/editprofil.css')}}">
@endpush
@section('konten')
@section('judul','Edit Profil')
<div class="edit-container">
    <div class="edit-menu">
        <a href="{{ route('editprofile') }}" class="menu-item">Ubah username</a>
        <a href="{{ route('editpassword') }}" class="menu-item active">Ubah kata sandi</a>
        <a href="{{ route('profile') }}" class="close" title="Kembali">
            <i class="bx bx-x"></i>
        </a>
    </div>
    <div class="edit-content">
        <form action="{{ route('updatePassword') }}" method="POST">
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
                <label for="password_lama" class="form-label">Kata Sandi Lama</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan kata sandi lama" required>
                    <button type="button" id="togglePasswordLama" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_baru" class="form-label">Kata Sandi Baru</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan kata sandi baru" required>
                    <button type="button" id="togglePasswordBaru" class="btn-eye">
                        <i class="bx bx-hide"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_baru_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" class="form-control" id="password_baru_confirmation" name="password_baru_confirmation" placeholder="Konfirmasi kata sandi" required>
                    <button type="button" id="togglePasswordConfirm" class="btn-eye">
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
            window.location.href = "{{ route('profile') }}";
        }
    });
</script>
@endif
<script>
    const togglePasswordLamaButton = document.getElementById('togglePasswordLama');
    const passwordInputLama = document.getElementById('password_lama');

    togglePasswordLamaButton.addEventListener('click', function() {
        const type = passwordInputLama.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputLama.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });

    const togglePasswordBaruButton = document.getElementById('togglePasswordBaru');
    const passwordInputBaru = document.getElementById('password_baru');

    togglePasswordBaruButton.addEventListener('click', function() {
        const type = passwordInputBaru.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputBaru.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });

    const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirm');
    const passwordInputConfirm = document.getElementById('password_baru_confirmation');

    togglePasswordConfirmButton.addEventListener('click', function() {
        const type = passwordInputConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInputConfirm.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script>
@endpush