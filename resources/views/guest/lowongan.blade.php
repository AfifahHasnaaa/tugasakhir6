@extends('layout.main')
@section('title', 'Lowongan')

@push('styles')
<link rel="stylesheet" href="{{asset('css/daftarlowongan.css')}}">
@endpush

@section('content')
<div class="kontenlowongan">
    <div class="row mb-3" id="filterForm">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <input type="text" class="form-control" placeholder="Cari disini..." id="searchInput" onkeyup="filterLowongan()">
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <select id="provinsi" name="provinsi" class="form-select" onchange="filterLowongan()">
                <option>Pilih Provinsi</option>
            </select>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <button type="button" class="btn btn-secondary" onclick="resetFilter()"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @if($lowongan->isEmpty())
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
            <div class="text-center">
                <h3 class="text-danger"><i class="bi bi-x-circle"></i> Tidak Ada Data</h3>
                <p>Belum ada lowongan yang tersedia saat ini.</p>
            </div>
        </div>
        @else
        @foreach ($lowongan as $item)
        <div data-aos="zoom-out" data-aos-delay="10">
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('detaillowonganguest', $item->id_lowongan) }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                @if($item->logo && file_exists(public_path('storage/logo/' . $item->logo)))
                                <img src="{{ asset('storage/logo/' . $item->logo) }}" alt="Logo {{ $item->nama_instansi }}" class="me-3" style="width: 100px;">
                                @else
                                <p class="text-center" style="width: 100px; font-size: 1rem; color: gray;">Tidak ada logo instansi</p>
                                @endif
                                <div style="margin-left: 15px;">
                                    <h5 class="card-title">{{ $item->posisi }}</h5>
                                    <p class="card-text">{{ $item->nama_instansi }}</p>
                                    <p class="mb-2"><i class="bi bi-briefcase"></i> {{ $item->syarat_pengalaman }}</p>
                                    <p><i class="bi bi-geo-alt"></i> {{ ucwords(strtolower($item->provinsi)) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <button id="backToTop" class="backtotop"><i class="bi bi-arrow-up-circle"></i></button>
</div>
@endsection
@push('scripts')
<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    function ambil_provinsi() {
        var link = '{{ url("api/provinsi") }}';
        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                $('#provinsi').html(data);
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error Pengambilan Data Provinsi : ' + errorMsg);
            }
        })
    }

    ambil_provinsi()
</script>
<script>
    function filterLowongan() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const selectedProvinsi = document.getElementById('provinsi').value.toLowerCase();

        const namaProvinsi = selectedProvinsi.split('||')[1]?.toLowerCase();
        const lowonganItems = document.querySelectorAll('.card');
        const container = document.querySelector('.row.row-cols-1');
        const matchingItems = [];
        const nonMatchingItems = [];

        lowonganItems.forEach(item => {
            const posisi = item.querySelector('.card-title').innerText.toLowerCase();
            const instansi = item.querySelector('.card-text').innerText.toLowerCase();
            const lokasi = item.querySelector('.bi-geo-alt').parentElement.innerText.toLowerCase();
            const provinsi = item.querySelector('.bi-geo-alt').parentElement.innerText.toLowerCase();

            const matchesSearch = posisi.includes(searchInput) || instansi.includes(searchInput);

            const matchesProvinsi = !namaProvinsi || lokasi.includes(namaProvinsi);
            if (matchesSearch && matchesProvinsi) {
                matchingItems.push(item.parentElement);
                item.parentElement.style.display = 'block';
            } else {
                nonMatchingItems.push(item.parentElement);
                item.parentElement.style.display = 'none';
            }
        });

        container.innerHTML = '';
        matchingItems.forEach(item => container.appendChild(item));
        nonMatchingItems.forEach(item => container.appendChild(item));
    }

    function resetFilter() {
        document.getElementById('searchInput').value = '';
        document.getElementById('provinsi').value = '';
        window.location.href = "{{ route('lowonganguest') }}";
    }

    document.addEventListener('DOMContentLoaded', function() {
        const backToTopButton = document.getElementById('backToTop');
        const searchBar = document.getElementById('filterForm');

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function checkSearchBarVisibility() {
            const rect = searchBar.getBoundingClientRect();
            const isVisible = rect.bottom > 0 && rect.top < window.innerHeight;
            if (isVisible) {
                backToTopButton.classList.remove('show');
                backToTopButton.classList.add('hide');
            } else {
                backToTopButton.classList.remove('hide');
                backToTopButton.classList.add('show');
            }
        }

        backToTopButton.addEventListener('click', scrollToTop);

        window.addEventListener('scroll', checkSearchBarVisibility);

        checkSearchBarVisibility();
    });
</script>
@endpush