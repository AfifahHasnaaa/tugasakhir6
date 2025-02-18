@extends('layout.adminLayout')
@section('title','Prestasi Alumni - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/prestasi.css')}}">
@endpush
@section('konten')
@section('judul','Prestasi Alumni')

<div class="prestasi-container">
    <form method="GET" action="{{ route('prestasi') }}" class="search-bar">
        <input type="text" name="search" class="form-control w-75" placeholder="Cari disini..." value="{{ request('search') }}">
        <button class="tambah"><a href="{{ route('tambahprestasi') }}">Tambah Prestasi</a></button>
    </form>

    @php $delay = 10; @endphp 
    @foreach($prestasi as $item)
    <div>
        <div class="alumni-card">
            <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="profile-image">
            <div class="alumni-info">
                <h5>{{ $item->nama }}</h5>

                @if($item->keterangan == '3')
                <p><strong>Universitas:</strong> {{ $item->tempat }}</p>
                <p><strong>Program Studi:</strong> {{ $item->posisi }}</p>
                @elseif($item->keterangan == '2')
                <p><strong>Nama Usaha:</strong> {{ $item->tempat }}</p>
                <p><strong>Posisi:</strong> {{ $item->posisi }}</p>
                @elseif($item->keterangan == '1')
                <p><strong>Nama Perusahaan:</strong> {{ $item->tempat }}</p>
                <p><strong>Posisi:</strong> {{ $item->posisi }}</p>
                @else
                <p><strong>Perusahaan/Usaha/Universitas:</strong> {{ $item->tempat }}</p>
                <p><strong>Posisi/Program Studi:</strong> {{ $item->posisi }}</p>
                @endif

                <p><strong>Prestasi:</strong> {{ $item->prestasi }}</p>
            </div>


            <div class="alumni-actions">
                <form id="hapus-form-{{ $item->id_prestasi }}" action="{{ route('dataprestasi.destroy', $item->id_prestasi) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                <button class="btn btn-danger" onclick="hapusPrestasi('{{ $item->id_prestasi }}')"><i class="bi bi-trash3-fill"></i></button>
                <button class="btn btn-warning"><a href="{{ route('editprestasi', $item->id_prestasi) }}"><i class="bi bi-pencil-fill"></i></a></button>
            </div>
        </div>
    </div>
    @php $delay += 10; @endphp 
    @endforeach
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapusPrestasi(id_prestasi) {
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
                document.getElementById('hapus-form-' + id_prestasi).submit();
            }
        });
    }
</script>
<script>
    document.querySelector('.search-bar input').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var alumniCards = document.querySelectorAll('.alumni-card');
        alumniCards.forEach(function(card) {
            var alumniName = card.querySelector('.alumni-info h5').textContent.toLowerCase();
            var alumniInfo = card.querySelector('.alumni-info').textContent.toLowerCase();

            if (alumniName.includes(searchText) || alumniInfo.includes(searchText)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

@endpush