@extends('layout.adminLayout')
@section('title','Edit Prestasi - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/prestasi.css')}}">
@endpush
@section('konten')
@section('judul','Edit Prestasi Alumni')
<div class="editprestasi-container">
    <div class="formeditprestasi">
        <form action="{{ route('prestasi.update', $prestasi->id_prestasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $prestasi->nama) }}" placeholder="Masukkan Nama">
            </div>

            <div class="mb-3">
                <label for="tahun-lulus" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control" id="tahun-lulus" name="tahun_lulus" value="{{ old('tahun_lulus', $prestasi->tahun_lulus) }}" placeholder="Masukkan Tahun Lulus">
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-select" id="keterangan" name="keterangan" style="width: 100%;" onchange="ubahPlaceholder()">
                    <option value="" disabled>Pilih Keterangan</option>
                    <option value="1" {{ $prestasi->keterangan == 1 ? 'selected' : '' }}>Karyawan</option>
                    <option value="2" {{ $prestasi->keterangan == 2 ? 'selected' : '' }}>Pengusaha</option>
                    <option value="3" {{ $prestasi->keterangan == 3 ? 'selected' : '' }}>Lanjut Pendidikan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tempat" class="form-label">Perusahaan/Usaha/Universitas</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ old('tempat', $prestasi->tempat) }}" placeholder="Masukkan Nama Perusahaan atau Universitas">
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi/Program Studi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $prestasi->posisi) }}" placeholder="Masukkan Posisi atau Program Studi">
            </div>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <input type="text" class="form-control" id="prestasi" name="prestasi" value="{{ old('prestasi', $prestasi->prestasi) }}" placeholder="Masukkan Prestasi">
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