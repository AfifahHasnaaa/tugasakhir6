@extends('layout.adminLayout')
@section('title','Tambah Prestasi - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/prestasi.css')}}">
@endpush
@section('konten')
@section('judul','Tambah Prestasi Alumni')
<div class="tambahprestasi-container">
    <div class="formtambahprestasi">
        <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
            </div>

            <div class="mb-3">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus">
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-select" id="keterangan" name="keterangan" style="width: 100%;" onchange="ubahPlaceholder()">
                    <option selected>Pilih Keterangan</option>
                    <option value="1">Karyawan</option>
                    <option value="2">Pengusaha</option>
                    <option value="3">Lanjut Pendidikan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tempat" class="form-label">Perusahaan/Usaha/Universitas</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Nama Perusahaan atau Universitas">
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi/Program Studi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Masukkan Posisi atau Program Studi">
            </div>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <textarea class="form-control form-user-input" id="prestasi" name="prestasi" rows="4" placeholder="Masukkan Prestasi" required=""></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function ubahPlaceholder() {
        const keterangan = document.getElementById('keterangan').value;
        const tempatInput = document.getElementById('tempat');
        const posisiInput = document.getElementById('posisi');

        if (keterangan === "3") {
            tempatInput.placeholder = "Masukkan Universitas";
            posisiInput.placeholder = "Masukkan Program Studi";
            document.querySelector('label[for="tempat"]').textContent = "Universitas";
            document.querySelector('label[for="posisi"]').textContent = "Program Studi";

        } else if (keterangan === "2") {
            tempatInput.placeholder = "Masukkan Nama Usaha";
            posisiInput.placeholder = "Masukkan Posisi";
            document.querySelector('label[for="tempat"]').textContent = "Nama Usaha";
            document.querySelector('label[for="posisi"]').textContent = "Posisi";
        } else if (keterangan === "1") {
            tempatInput.placeholder = "Masukkan Nama Perusahaan";
            posisiInput.placeholder = "Masukkan Posisi";
            document.querySelector('label[for="tempat"]').textContent = "Nama Perusahaan";
            document.querySelector('label[for="posisi"]').textContent = "Posisi";
        } else {
            tempatInput.placeholder = "Masukkan Nama Perusahaan atau Universitas";
            posisiInput.placeholder = "Masukkan Posisi atau Program Studi";
            document.querySelector('label[for="tempat"]').textContent = "Perusahaan/Usaha/Universitas";
            document.querySelector('label[for="posisi"]').textContent = "Posisi/Program Studi";
        }
    }
</script>
@endpush