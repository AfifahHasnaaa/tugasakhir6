@extends('layout.adminLayout')
@section('title', 'Data Alumni - SMKN 1 Bantul')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataalumni.css') }}">
@endpush

@section('konten')
@section('judul', 'Data User')

<div class="container">
    <div class="row justify-content-between mb-3 mt-3">
        <div class="col-md-6">
            <h3>Data User</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="" class="btn btn-primary" style="color;white;">Tambah User</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="entriesPerPage" class="form-label">Entries per page</label>
            <select id="entriesPerPage" class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table id="data-list" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    {{-- <th>Password</th> --}}
                    <th>Tanggal Buat</th>
                    <th>Tanggal Login</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ strtoupper($data->username) }}</td>
                    <td>{{ strtoupper($data->email) }}</td>
                    {{-- <td>{{ $data->password }}</td> --}}
                    <td>{{ $data->tanggal_buat }}</td>
                    <td>{{ $data->tanggal_login }}</td>
                    <td>
                        {{-- <a href="{{ route('datauser.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        <form action="{{ route('datauser.destroy', $data->id_user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#data-list').DataTable({
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[1, "asc"]],
            "responsive": true,
            "dom": 't<"row"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>'
        });

        $("#entriesPerPage").on('change', function() {
            var entries = $(this).val();
            $('#data-list').DataTable().page.len(entries).draw();
        });
    });
</script>
@endpush
