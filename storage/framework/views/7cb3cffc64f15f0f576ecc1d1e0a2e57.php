<?php $__env->startSection('title','Prestasi Alumni - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/prestasi.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Prestasi Alumni'); ?>

<div class="prestasi-container">
    <form method="GET" action="<?php echo e(route('prestasi')); ?>" class="search-bar">
        <input type="text" name="search" class="form-control w-75" placeholder="Cari disini..." value="<?php echo e(request('search')); ?>">
        <button class="tambah"><a href="<?php echo e(route('tambahprestasi')); ?>">Tambah Prestasi</a></button>
    </form>

    <?php $delay = 10; ?> 
    <?php $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
        <div class="alumni-card">
            <img src="<?php echo e(asset($item->foto)); ?>" alt="<?php echo e($item->nama); ?>" class="profile-image">
            <div class="alumni-info">
                <h5><?php echo e($item->nama); ?></h5>

                <?php if($item->keterangan == '3'): ?>
                <p><strong>Universitas:</strong> <?php echo e($item->tempat); ?></p>
                <p><strong>Program Studi:</strong> <?php echo e($item->posisi); ?></p>
                <?php elseif($item->keterangan == '2'): ?>
                <p><strong>Nama Usaha:</strong> <?php echo e($item->tempat); ?></p>
                <p><strong>Posisi:</strong> <?php echo e($item->posisi); ?></p>
                <?php elseif($item->keterangan == '1'): ?>
                <p><strong>Nama Perusahaan:</strong> <?php echo e($item->tempat); ?></p>
                <p><strong>Posisi:</strong> <?php echo e($item->posisi); ?></p>
                <?php else: ?>
                <p><strong>Perusahaan/Usaha/Universitas:</strong> <?php echo e($item->tempat); ?></p>
                <p><strong>Posisi/Program Studi:</strong> <?php echo e($item->posisi); ?></p>
                <?php endif; ?>

                <p><strong>Prestasi:</strong> <?php echo e($item->prestasi); ?></p>
            </div>


            <div class="alumni-actions">
                <form id="hapus-form-<?php echo e($item->id_prestasi); ?>" action="<?php echo e(route('dataprestasi.destroy', $item->id_prestasi)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>
                <button class="btn btn-danger" onclick="hapusPrestasi('<?php echo e($item->id_prestasi); ?>')"><i class="bi bi-trash3-fill"></i></button>
                <button class="btn btn-warning"><a href="<?php echo e(route('editprestasi', $item->id_prestasi)); ?>"><i class="bi bi-pencil-fill"></i></a></button>
            </div>
        </div>
    </div>
    <?php $delay += 10; ?> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/admin/prestasi.blade.php ENDPATH**/ ?>