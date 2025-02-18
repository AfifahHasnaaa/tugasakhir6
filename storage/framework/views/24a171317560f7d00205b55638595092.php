
<?php $__env->startSection('title', 'Data Alumni - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/dataalumni.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul', 'Data User'); ?>

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
                    
                    <th>Tanggal Buat</th>
                    <th>Tanggal Login</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e(strtoupper($data->username)); ?></td>
                    <td><?php echo e(strtoupper($data->email)); ?></td>
                    
                    <td><?php echo e($data->tanggal_buat); ?></td>
                    <td><?php echo e($data->tanggal_login); ?></td>
                    <td>
                        
                        <form action="<?php echo e(route('datauser.destroy', $data->id_user)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/admin/datauser.blade.php ENDPATH**/ ?>