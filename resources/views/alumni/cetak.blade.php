@extends('layout.alumniLayout')
@section('title', 'Cetak Bukti - SMKN 1 Bantul')
@push('styles')
<link rel="stylesheet" href="{{asset('css/cetak.css')}}">
@endpush
@section('konten')
@section('judul','Cetak Bukti')
<div class="card">
    <div class="card-header">
        <strong>Bukti Pengisian Data Alumni SMK N 1 Bantul</strong>
    </div>
    <div class="card-body">
        <p>Nama <span class="ms-4">:</span> {{ $alumni->nama_alumni }}</p>
        <p>NIS <span class="ms-5">:</span> {{ $alumni->nis }}</p>
        <p>Status <span class="ms-4">:</span> {{ $alumni->status }}</p>
        <p>Tanggal <span class="ms-2">:</span> {{ \Carbon\Carbon::parse($alumni->tanggal_up_data)->translatedFormat('d F Y') }}</p>
    </div>
    <div class="btn-container">
        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush