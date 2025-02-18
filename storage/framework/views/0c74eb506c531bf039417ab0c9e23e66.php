<?php $__env->startSection('title', 'Contoh CV - SMKN 1 Bantul'); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Contoh CV'); ?>
<div class="p-5">
    <div class="border rounded-3 pe-5 ps-5 pt-5 pb-5" style="background-color:rgb(91, 146, 230);">
        <div class="row">
            <div class="col-md-9">
                <p class="fw-bolder" style="font-size: x-large;">Curriculum Vitae</p>
                <p class="fw-bolder">Data Pribadi</p>
                <ul>
                    <li>Nama : Nama Anda</li>
                    <li>Tempat, Tanggal Lahir : Sesuaikan</li>
                    <li>Jenis Kelamin : Sesuaikan</li>
                    <li>Agama : Sesuaikan</li>
                    <li>Tinggi Badan : Sesuaikan</li>
                    <li>Berat Badan : Sesuaikan</li>
                    <li>Alamat : Sesuai KTP anda</li>
                    <li>No Hp : Sesuaikan</li>
                    <li>Status : Sesuaikan</li>
                    <li>Email : Sesuaikan</li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSjkWNYkyTK94NswJwN5f4kUJ7eQMn2GJ7w&s" alt="" width="200">
            </div>
        </div>
        <div>
            <p class="fw-bolder">Pendidikan</p>
            <ul>
                <li>SD : Sesuaikan</li>
                <li>SMP : Sesuaikan</li>
                <li>SMK : Sesuaikan</li>
            </ul>
        </div>
        <div>
            <p class="fw-bolder">Kemampuan</p>
            <ul>
                <li>MYOB( Misalnya)</li>
                <li>Sesuaikan</li>
                <li>Sesuaikan</li>
            </ul>
        </div>
        <div>
            <p class="fw-bolder">Pengalaman Organisasi</p>
            <ul>
                <li>OSIS( Misalnya)</li>
                <li>Sesuaikan</li>
                <li>Sesuaikan</li>
            </ul>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/alumni/cv.blade.php ENDPATH**/ ?>