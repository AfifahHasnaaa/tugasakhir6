@extends('layout.adminLayout')
@section('title','Detail Lowongan - SMKN 1 Bantul')

@push('styles')
<link rel="stylesheet" href="{{asset('css/detaillowongan.css')}}">
@endpush

@section('konten')
@section('judul','Detail Lowongan')
<div class="detail-lowongan">
    <div class="row container-fluid pt-2 pb-1 ">
        <div class="col-9">
            <h3 class="text-start" style="font-weight: 500;">
                {{ $lowongan->nama_instansi}}
            </h3>
            <h6 class="text-start" style="color:#6C757D">
                Membuka Lowongan
            </h6>
            <h1 class="text-start" style="font-weight: 800;">
                {{ $lowongan->posisi }}
            </h1>
        </div>
        <div class="col-3 logo-instansi text-end">
            @if($lowongan->logo && file_exists(public_path('storage/logo/' . $lowongan->logo)))
            <img src="{{ asset('storage/logo/' . $lowongan->logo) }}" alt="Logo {{ $lowongan->nama_instansi }}" class="me-3">
            @else
            <p class="text-center" style="width: 100px; font-size: 1 rem; color: gray;">Tidak ada logo instansi</p>
            @endif
        </div>
        <div>
            <p class="text-start" style="font-size: medium; font-weight: 400;">
                {{ $lowongan->deskripsi }}
            </p>
        </div>
    </div>
    <hr>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Ringkasan
        </div>
        <div>
            <p><img src="{{ asset('asset/icon/pengalaman.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto">{{ $lowongan->syarat_pengalaman }}</span></p>
        </div>
        <div>
            <p><img src="{{ asset('asset/icon/gender.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto">{{ $lowongan->gender }}</span></p>
        </div>
        <div>
            <p>
                <img src="{{ asset('asset/icon/gaji.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto">
                <span class="text-center pt-auto pb-auto">
                    @if($lowongan->gaji == 'Kompetitif' || $lowongan->gaji == 'UMR')
                    {{ $lowongan->gaji }}
                    @else
                    Rp {{ number_format($lowongan->gaji, 0, ',', '.') }}
                    @endif
                </span>
            </p>
        </div>
        <div>
            <p><img src="{{ asset('asset/icon/lokasi.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto">{{ ucwords(strtolower( $lowongan->alamat)) }}, {{ ucwords(strtolower( $lowongan->kelurahan)) }}, {{ ucwords(strtolower( $lowongan->kecamatan)) }}, {{ ucwords(strtolower( $lowongan->kabupaten)) }}, {{ ucwords(strtolower( $lowongan->provinsi)) }}</span></p>
        </div>
    </div>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Deskripsi Pekerjaan
        </div>
        <ul>
            @foreach(explode("\n", $lowongan->deskripsi_pekerjaan) as $deskripsi)
            @if(trim($deskripsi) != '') 
            <li>{{ $deskripsi }}</li>
            @endif
            @endforeach
        </ul>
    </div>
    <div>
        <div class="pt-1 pb-1" style="font-size:large;font-weight:bold">
            Syarat
        </div>
        <ul>
            @foreach(explode("\n", $lowongan->syarat_pekerjaan) as $syarat)
            @if(trim($syarat) != '')
            <li>{{ $syarat }}</li>
            @endif
            @endforeach
        </ul>
    </div>
    <div>
        <div class="pt-1 pb-2" style="font-size:large;font-weight:bold">
            Kirim Lamaran
        </div>
        <div>
            <p><img src="{{ asset('asset/icon/telephone.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto">{{ $lowongan->no_kontak }}</span></p>
        </div>
        <div>
            <p><img src="{{ asset('asset/icon/emaill.png') }}" alt="" width="20" height="20" class="pt-auto pb-auto"> <span class="text-center pt-auto pb-auto">{{ $lowongan->email }}</span></p>
        </div>
    </div>
    <div class="detail-button">
        <form id="hapus-form-{{ $lowongan->id_lowongan }}" action="{{ route('lowongandata.destroy', $lowongan->id_lowongan) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <button class="btn btn-danger" onclick="hapusLowongan('{{ $lowongan->id_lowongan }}')">
            Hapus
        </button>
        <button class="edit"><a href="{{ url('lowongan/edit/' . $lowongan->id_lowongan) }}">Edit</a></button>
    </div>
</div>
@endsection
<script>
    function hapusLowongan(id_lowongan) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function() {
                    document.getElementById('hapus-form-' + id_lowongan).submit();
                }, 2000);
            }
        });
    }
</script>