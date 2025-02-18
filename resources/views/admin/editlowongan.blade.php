@extends('layout.adminLayout')
@section('title','Edit Lowongan - SMKN 1 Bantul')

@push('styles')
<link rel="stylesheet" href="{{asset('css/tambahlowongan.css')}}">
@endpush

@section('konten')
@section('judul','Edit Lowongan')
<div class="tambahlowongan p-5">
    <div class="card-body">
        <form id="formData" action="{{ route('lowongan.update', $data_view->id_lowongan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="PUT">
            <div class="row mb-3">
                <label for="namaInstansi" class="col-sm-3 col-form-label">Nama Instansi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="namaInstansi" name="nama_instansi" placeholder="Masukkan nama instansi" required="" value="{{ $data_view->nama_instansi }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsiInstansi" class="col-sm-3 col-form-label">Deskripsi Instansi</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="deskripsiInstansi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi instansi" required="">{{ $data_view->deskripsi }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="posisiKerja" class="col-sm-3 col-form-label">Posisi Kerja</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="posisiKerja" name="posisi" placeholder="Masukkan posisi kerja" required="" value="{{ $data_view->posisi }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="pengalaman" class="col-sm-3 col-form-label">Pengalaman</label>
                <div class="col-sm-9">
                    <select class="form-select form-user-input" id="pengalaman" name="syarat_pengalaman" required="">
                        <option value="" disabled {{ $data_view->syarat_pengalaman == '' ? 'selected' : '' }}>Pilih syarat pengalaman</option>
                        <option value="Tanpa Pengalaman" {{ $data_view->syarat_pengalaman == 'Tanpa Pengalaman' ? 'selected' : '' }}>Tanpa Pengalaman</option>
                        <option value="1-2 Tahun" {{ $data_view->syarat_pengalaman == '1-2 Tahun' ? 'selected' : '' }}>1-2 Tahun</option>
                        <option value="3-4 Tahun" {{ $data_view->syarat_pengalaman == '3-4 Tahun' ? 'selected' : '' }}>3-4 Tahun</option>
                        <option value="5 Tahun Lebih" {{ $data_view->syarat_pengalaman == '5 Tahun Lebih' ? 'selected' : '' }}>5 Tahun Lebih</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jenisKelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select class="form-select form-user-input" id="jenisKelamin" name="gender" required="">
                        <option value="" disabled {{ $data_view->gender == '' ? 'selected' : '' }}>Pilih jenis kelamin</option>
                        <option value="Laki-Laki" {{ $data_view->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $data_view->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        <option value="Laki-Laki/Perempuan" {{ $data_view->gender == 'Laki-Laki/Perempuan' ? 'selected' : '' }}>Laki-Laki/Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Besaran Gaji</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-user-input" type="radio" name="gaji" id="umr" value="UMR" {{ $data_view->gaji == 'UMR' ? 'checked' : '' }}>
                        <label class="form-check-label" for="umr">UMR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-user-input" type="radio" name="gaji" id="kompetitif" value="Kompetitif" {{ $data_view->gaji == 'Kompetitif' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kompetitif">Kompetitif</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gaji" id="gaji-sendiri" value="Gaji Sendiri" {{ is_numeric($data_view->gaji) ? 'checked' : '' }}>
                        <label class="form-check-label" for="gaji-sendiri">Isi Gaji Sendiri</label>
                        <div class="form-group" id="input-gaji-sendiri" style="display: none;">
                            <input type="number" class="form-control form-user-input" placeholder="Masukkan jumlah gaji" id="jumlah-gaji-sendiri" value="{{ is_numeric($data_view->gaji) ? $data_view->gaji : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <div class="lokasi">
                        <div class="form-item mb-3">
                            <label for="provinsi" style="width: 144px;">Provinsi</label>
                            <select class="form-select form-user-input" id="provinsi" name="provinsi" required="" onchange="ambil_kabupaten()">
                                <option disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kabupaten" style="width: 144px;">Kabupaten</label>
                            <select class="form-select form-user-input" id="kabupaten" name="kabupaten" required="" onchange="ambil_kecamatan()">
                                <option disabled selected>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kecamatan" style="width: 144px;">Kecamatan</label>
                            <select class="form-select form-user-input" id="kecamatan" name="kecamatan" required="" onchange="ambil_kelurahan()">
                                <option disabled selected>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="form-item mb-3">
                            <label for="kelurahan" style="width: 144px;">Kelurahan</label>
                            <select class="form-select form-user-input" id="kelurahan" name="kelurahan" required="">
                                <option disabled selected>Pilih Kelurahan</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="alamat" style="width: 144px;">Alamat</label>
                            <textarea class="form-control form-user-input" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat instansi" required="">{{ $data_view->alamat }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="syarat" class="col-sm-3 col-form-label">Syarat</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="syarat" name="syarat_pekerjaan" rows="4" cols="50" placeholder="Masukkan syarat" required="">{{ $data_view->syarat_pekerjaan }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="deskripsiPekerjaan" class="col-sm-3 col-form-label">Deskripsi Pekerjaan</label>
                <div class="col-sm-9">
                    <textarea class="form-control form-user-input" id="deskripsiPekerjaan" name="deskripsi_pekerjaan" rows="4" cols="50" placeholder="Masukkan deskripsi pekerjaan" required="">{{ $data_view->deskripsi_pekerjaan }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="kontak" class="col-sm-3 col-form-label">Kontak</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-user-input" id="kontak" name="no_kontak" placeholder="Masukkan kontak" required="" value="{{ $data_view->no_kontak }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control form-user-input" id="email" name="email" placeholder="Masukkan email" required="" autocomplete="on" value="{{ $data_view->email }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="logoInstansi" class="col-sm-3 col-form-label">Logo Instansi</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control form-user-input" name="logo" id="logoInstansi" accept="image/*">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="button" class="btn btn-secondary me-2">Batal</button>
                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('input[name="gaji"]').on('change', function() {
            if ($(this).val() === 'Gaji Sendiri') {
                $('#input-gaji-sendiri').show();
            } else {
                $('#input-gaji-sendiri').hide();
            }
        });

        if ($('input[name="gaji"]:checked').val() === 'Gaji Sendiri') {
            $('#input-gaji-sendiri').show();
        }

        function sendData() {
            var idLowongan = '{{ $data_view->id_lowongan }}';
            var url_post = '{{ url("api/lowongan/input") }}/' + idLowongan;

            var dataForm = new FormData();

            dataForm.append('_method', 'PUT');

            var selectedGaji = $('input[name="gaji"]:checked').val();
            var jumlahGaji;

            if (selectedGaji === 'Gaji Sendiri') {
                jumlahGaji = $('#jumlah-gaji-sendiri').val();
                if (!jumlahGaji) {
                    alert('Silakan masukkan jumlah gaji!');
                    return;
                }
                selectedGaji = parseFloat(jumlahGaji);
                if (isNaN(selectedGaji)) {
                    alert('Jumlah gaji tidak valid!');
                    return;
                }
            }

            dataForm.append('gaji', selectedGaji);

            $('.form-user-input').each(function() {
                var inputName = $(this).attr('name');
                var inputValue = $(this).val();
                if (inputName !== 'gaji') {
                    dataForm.append(inputName, inputValue);
                }
            });

            var fileInput = $('#logoInstansi')[0].files[0];
            if (fileInput) {
                dataForm.append('logo', fileInput);
            }

            $.ajax({
                url: url_post,
                type: 'POST',
                headers: {
                    'X-HTTP-Method-Override': 'PUT'
                },
                data: dataForm,
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data berhasil disimpan!',
                    }).then(() => {
                        var detailUrl = '{{ url("detaillowonganadmin") }}/' + idLowongan;
                        window.location.href = detailUrl;
                    });
                },
                error: function(jqXHR) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: jqXHR.responseJSON.message || 'Terjadi kesalahan!',
                    });
                }
            });
        }

        $('#submit').on('click', function(event) {
            event.preventDefault();
            sendData();
        });
    });

    function ambil_provinsi(selectedProvinsiName = null) {
        return new Promise(function(resolve, reject) {
            var link = '{{ url("api/provinsi") }}';
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#provinsi').html(data);

                    if (selectedProvinsiName) {
                        $('#provinsi option').filter(function() {
                            return $(this).text().trim() == selectedProvinsiName;
                        }).prop('selected', true);

                        resolve($('#provinsi').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Provinsi: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kabupaten(selectedProvinsiValue, selectedKabupatenName = null) {
        return new Promise(function(resolve, reject) {
            var link = '{{ url("api/kota/") }}' + '/' + selectedProvinsiValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kabupaten').html(data);

                    if (selectedKabupatenName) {
                        $('#kabupaten option').filter(function() {
                            return $(this).text().trim() == selectedKabupatenName;
                        }).prop('selected', true);

                        resolve($('#kabupaten').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kabupaten: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kecamatan(selectedKabupatenValue, selectedKecamatanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '{{ url("api/kecamatan/") }}' + '/' + selectedKabupatenValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kecamatan').html(data);

                    if (selectedKecamatanName) {
                        $('#kecamatan option').filter(function() {
                            return $(this).text().trim() == selectedKecamatanName;
                        }).prop('selected', true);

                        resolve($('#kecamatan').val());
                    } else {
                        resolve(null);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kecamatan: ' + errorMsg);
                }
            });
        });
    }

    function ambil_kelurahan(selectedKecamatanValue, selectedKelurahanName = null) {
        return new Promise(function(resolve, reject) {
            var link = '{{ url("api/kelurahan/") }}' + '/' + selectedKecamatanValue.split("||")[0];
            $.ajax(link, {
                type: 'GET',
                success: function(data, status, xhr) {
                    $('#kelurahan').html(data);

                    if (selectedKelurahanName) {
                        $('#kelurahan option').filter(function() {
                            return $(this).text().trim() == selectedKelurahanName;
                        }).prop('selected', true);

                        resolve();
                    } else {
                        resolve();
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    reject('Error Pengambilan Data Kelurahan: ' + errorMsg);
                }
            });
        });
    }

    ambil_provinsi('{{ $data_view->provinsi }}')
        .then(selectedProvinsiValue => ambil_kabupaten(selectedProvinsiValue, '{{ $data_view->kabupaten }}'))
        .then(selectedKabupatenValue => ambil_kecamatan(selectedKabupatenValue, '{{ $data_view->kecamatan }}'))
        .then(selectedKecamatanValue => ambil_kelurahan(selectedKecamatanValue, '{{ $data_view->kelurahan }}'))
        .catch(error => console.log(error));

    function resetAlamat() {
        $('#alamat').val('');
    }

    $('#provinsi').change(function() {
        var selectedProvinsiValue = $(this).val();
        resetAlamat();

        $('#kabupaten').html('<option disabled selected>Pilih Kabupaten</option>');
        $('#kecamatan').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedProvinsiValue) {
            ambil_kabupaten(selectedProvinsiValue);
        }
    });

    $('#kabupaten').change(function() {
        var selectedKabupatenValue = $(this).val();
        resetAlamat();

        $('#kecamatan').html('<option disabled selected>Pilih Kecamatan</option>');
        $('#kelurahan').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKabupatenValue) {
            ambil_kecamatan(selectedKabupatenValue);
        }
    });

    $('#kecamatan').change(function() {
        var selectedKecamatanValue = $(this).val();
        resetAlamat();

        $('#kelurahan').html('<option disabled selected>Pilih Kelurahan</option>');

        if (selectedKecamatanValue) {
            ambil_kelurahan(selectedKecamatanValue);
        }
    });

    $('#kelurahan').change(function() {
        var selectedKelurahanValue = $(this).val();
        resetAlamat();
    });
</script>
@endpush