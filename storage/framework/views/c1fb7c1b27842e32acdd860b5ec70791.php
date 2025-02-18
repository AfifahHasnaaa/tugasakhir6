<?php $__env->startSection('title', 'Detail Alumni - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/detailalumni.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Detail Alumni'); ?>
<div class="detailalumni">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-user" style="margin-right: 8px;"></i>Profil</th>
                </tr>
                <tr>
                    <td id="keterangan">Nama Lengkap</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->nama_alumni ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->nis ?? '-'); ?></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->nisn ?? '-'); ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->tempat_lahir ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->tanggal_lahir ? strtoupper(\Carbon\Carbon::parse($alumni->tanggal_lahir)->translatedFormat('d F Y')) : '-'); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->jenis_kelamin_text ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->agama ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->status ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Alasan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->alasan ?? '-'); ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-home" style="margin-right: 8px;"></i>Alamat</th>
                </tr>
                <tr>
                    <td id="keterangan">Kelurahan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kelurahan ?? '-')); ?></td>
                </tr>
                <tr>
                    <td id="keterangan">Kecamatan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kecamatan ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kabupaten ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->provinsi ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->alamat ?? '-')); ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-home" style="margin-right: 8px;"></i>Alamat Domisili</th>
                </tr>
                <tr>
                    <td id="keterangan">Kelurahan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kelurahan_domisili ?? '-')); ?></td>
                </tr>
                <tr>
                    <td id="keterangan">Kecamatan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kecamatan_domisili ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Kabupaten/Kota</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->kabupaten_domisili ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->provinsi_domisili ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->alamat_domisili ?? '-')); ?></td>
                </tr>
            </table>

        </div>

        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-graduation-cap" style="margin-right: 8px;"></i>Akademik</th>
                </tr>
                <tr>
                    <td id="keterangan">Tahun Masuk</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->tahun_masuk ?? '-'); ?></td>
                </tr>
                <tr>
                    <td>Tahun Lulus</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->tahun_lulus ?? '-'); ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->jurusan ?? '-')); ?></td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-university" style="margin-right:8px ;"></i>Pendidikan Lanjutan</th>
                </tr>
                <tr>
                    <td id="keterangan">Universitas</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->perguruan_tinggi ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->prodi ?? '-')); ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-briefcase" style="margin-right: 8px;"></i>Pekerjaan</th>
                </tr>
                <tr>
                    <td id="keterangan">Nama Perusahaan/Usaha</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->nama_perusahaan ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Bidang Pekerjaan/Usaha</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->bidang_pekerjaan ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Jabatan/Posisi</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->jabatan ?? '-')); ?></td>
                </tr>
                <tr>
                    <td>Penghasilan Bulanan</td>
                    <td id="titikdua">:</td>
                    <td>
                        <?php if($alumni->penghasilan): ?>
                        <?php echo e('Rp ' . number_format($alumni->penghasilan, 0, ',', '.')); ?>

                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td>Alamat Instansi</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e(strtoupper($alumni->alamat_instansi ?? '-')); ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th id="judul" colspan="3"><i class="fas fa-phone" style="margin-right: 8px;"></i>Kontak</th>
                </tr>
                <tr>
                    <td id="keterangan">No Telepon</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->no_telepon ?? '-'); ?></td>
                </tr>
                <tr>
                    <td id="keterangan">No Telepon Alternatif</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->no_telepon_alternatif ?? '-'); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td id="titikdua">:</td>
                    <td><?php echo e($alumni->email ?? '-'); ?></td>
                </tr>
            </table>
            <div class="d-flex justify-content-end">
                <form id="updateKeteranganForm" action="<?php echo e(route('update.keterangan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_alumni" value="<?php echo e($alumni->id_alumni); ?>">
                    <div class="d-flex align-items-center me-3">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="keterangan" id="hidup" value="Hidup"
                                <?php echo e($alumni->keterangan == 'Hidup' ? 'checked' : ''); ?>

                                onchange="konfirmasiUpdate('Hidup')">
                            <label class="form-check-label" for="hidup">Hidup</label>
                        </div>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="keterangan" id="meninggal" value="Meninggal"
                                <?php echo e($alumni->keterangan == 'Meninggal' ? 'checked' : ''); ?>

                                onchange="konfirmasiUpdate('Meninggal')">
                            <label class="form-check-label" for="meninggal">Meninggal</label>
                        </div>
                    </div>
                </form>
                <form id="delete-form-<?php echo e($alumni->id_alumni); ?>" action="<?php echo e(route('alumnidata.destroy', $alumni->id_alumni)); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>

                <button class="btn btn-danger" onclick="hapusAlumni('<?php echo e($alumni->id_alumni); ?>')">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function konfirmasiUpdate(status) {
        Swal.fire({
            title: `Konfirmasi Perubahan`,
            text: `Apakah Anda yakin ingin mengubah status menjadi ${status}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, ubah!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: `Status berhasil diubah menjadi ${status}.`,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
                setTimeout(function() {
                    document.getElementById('updateKeteranganForm').submit();
                }, 2000);
            } else {
                // Kembalikan status ke yang sebelumnya
                const previousStatus = "<?php echo e($alumni->keterangan); ?>";
                document.querySelector(`input[name="keterangan"][value="${previousStatus}"]`).checked = true;
            }
        });
    }

    function hapusAlumni(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini tidak dapat dipulihkan!",
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
                    document.getElementById('delete-form-' + id).submit();
                }, 2000); // menunggu 2 detik sebelum melakukan submit
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/admin/detailalumni.blade.php ENDPATH**/ ?>