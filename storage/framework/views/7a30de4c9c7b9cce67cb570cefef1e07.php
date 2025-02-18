<?php $__env->startSection('title','Edit Prestasi - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/prestasi.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Edit Prestasi Alumni'); ?>
<div class="editprestasi-container">
    <div class="formeditprestasi">
        <form action="<?php echo e(route('prestasi.update', $prestasi->id_prestasi)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Menampilkan pesan kesalahan -->
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(old('nama', $prestasi->nama)); ?>" placeholder="Masukkan Nama">
            </div>

            <!-- Tahun Lulus -->
            <div class="mb-3">
                <label for="tahun-lulus" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control" id="tahun-lulus" name="tahun_lulus" value="<?php echo e(old('tahun_lulus', $prestasi->tahun_lulus)); ?>" placeholder="Masukkan Tahun Lulus">
            </div>

            <!-- Keterangan -->
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-select" id="keterangan" name="keterangan" style="width: 100%;" onchange="ubahPlaceholder()">
                    <option value="" disabled>Pilih Keterangan</option>
                    <option value="1" <?php echo e($prestasi->keterangan == 1 ? 'selected' : ''); ?>>Karyawan</option>
                    <option value="2" <?php echo e($prestasi->keterangan == 2 ? 'selected' : ''); ?>>Pengusaha</option>
                    <option value="3" <?php echo e($prestasi->keterangan == 3 ? 'selected' : ''); ?>>Lanjut Pendidikan</option>
                </select>
            </div>

            <!-- Perusahaan/Usaha/Universitas -->
            <div class="mb-3">
                <label for="tempat" class="form-label">Perusahaan/Usaha/Universitas</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo e(old('tempat', $prestasi->tempat)); ?>" placeholder="Masukkan Nama Perusahaan atau Universitas">
            </div>

            <!-- Posisi/Program Studi -->
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi/Program Studi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" value="<?php echo e(old('posisi', $prestasi->posisi)); ?>" placeholder="Masukkan Posisi atau Program Studi">
            </div>

            <!-- Prestasi -->
            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <input type="text" class="form-control" id="prestasi" name="prestasi" value="<?php echo e(old('prestasi', $prestasi->prestasi)); ?>" placeholder="Masukkan Prestasi">
            </div>

            <!-- Upload Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function ubahPlaceholder() {
        const keterangan = document.getElementById('keterangan').value;
        const tempatInput = document.getElementById('tempat');
        const posisiInput = document.getElementById('posisi');

        if (keterangan === "3") { // Lanjut Pendidikan
            tempatInput.placeholder = "Masukkan Universitas";
            posisiInput.placeholder = "Masukkan Program Studi";
            document.querySelector('label[for="tempat"]').textContent = "Universitas";
            document.querySelector('label[for="posisi"]').textContent = "Program Studi";

        } else if (keterangan === "2") { // Pengusaha
            tempatInput.placeholder = "Masukkan Nama Usaha";
            posisiInput.placeholder = "Masukkan Posisi";
            document.querySelector('label[for="tempat"]').textContent = "Nama Usaha";
            document.querySelector('label[for="posisi"]').textContent = "Posisi";

        } else if (keterangan === "1") { // Karyawan
            tempatInput.placeholder = "Masukkan Nama Perusahaan";
            posisiInput.placeholder = "Masukkan Posisi";
            document.querySelector('label[for="tempat"]').textContent = "Nama Perusahaan";
            document.querySelector('label[for="posisi"]').textContent = "Posisi";

        } else { // Default
            tempatInput.placeholder = "Masukkan Nama Perusahaan atau Universitas";
            posisiInput.placeholder = "Masukkan Posisi atau Program Studi";
            document.querySelector('label[for="tempat"]').textContent = "Perusahaan/Usaha/Universitas";
            document.querySelector('label[for="posisi"]').textContent = "Posisi/Program Studi";
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/admin/editprestasi.blade.php ENDPATH**/ ?>