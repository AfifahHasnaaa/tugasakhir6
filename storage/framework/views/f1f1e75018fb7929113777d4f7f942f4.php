<?php $__env->startSection('title','Edit Prestasi - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/prestasi.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Edit Prestasi Alumni'); ?>
<div class="editprestasi-container">
    <div class="formeditprestasi">
        <form action="<?php echo e(route('prestasiuser.update', $prestasi->id_prestasi)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <input type="text" class="form-control" id="prestasi" name="prestasi" value="<?php echo e(old('prestasi', $prestasi->prestasi)); ?>" placeholder="Masukkan Prestasi">
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/alumni/editprestasi.blade.php ENDPATH**/ ?>