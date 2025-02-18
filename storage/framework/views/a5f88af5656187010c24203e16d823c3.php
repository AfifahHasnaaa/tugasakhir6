<?php $__env->startSection('title', 'Lamaran - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contohlamaran.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Contoh Surat Lamaran dan CV'); ?>
<?php if(isset($alumni)): ?>
<div class="mb-3 mt-3 me-3  text-end"><a href="" class="btn btn-success me-3" style="color: white;" id="downloadWord">Download Surat</a><a href="" class="btn btn-success" style="color: white;" id="downloadWordd">Download</a></div>
<div id="contentToExport">
    <h1>Surat Lamaran Kerja</h1>
    <div class="surat-lamaran">
        <p class="tanggal">Yogyakarta, 25 November 2024</p>

        <div class="penerima">
            <span>Kepada Yth.</span></br>
            <span>HRD [Nama Perusahaan]</span></br>
            <span>di tempat</span>
        </div>

        <div class="isi">
            <p>Dengan hormat,</p>
            <div class="data-diri">
                <p>
                    <span>Bersama surat ini, saya yang bertanda tangan di bawah ini:</span></br>
                    <span>Nama: <?php echo e(Auth::guard('alumni')->alum()->nama_alumni); ?></span><br>
                    <span>Tempat, Tanggal Lahir: <?php echo e(Auth::guard('alumni')->alum->tempat_lahir); ?>, <?php echo e(Auth::guard('alumni')->alum->tanggal_lahir); ?></span><br>
                    <span>Alamat: <?php echo e(Auth::guard('alumni')->alum->alamat); ?></span><br>
                    <span>Nomor Telepon: <?php echo e(Auth::guard('alumni')->alum->no_telepon); ?></span><br>
                    <span>Email: <?php echo e(Auth::guard('alumni')->alum->email); ?></span>
                </p>
            </div>
            <p>
                Mengajukan lamaran untuk posisi [Posisi yang Dilamar] di perusahaan yang Bapak/Ibu pimpin.
                Saya adalah alumni SMKN 1 Bantul jurusan <?php echo e(Auth::guard('alumni')->alum->jurusan); ?> tahun lulus <?php echo e(Auth::guard('alumni')->alum->tahun_lulus); ?>. Saya memiliki kemampuan di bidang [keahlian utama] dan pengalaman [jika ada].
            </p>
            <p>Bersama ini, saya lampirkan:</p>
            <ol>
                <li>Daftar Riwayat Hidup</li>
                <li>Fotokopi Ijazah</li>
                <li>Fotokopi Sertifikat Pendukung</li>
            </ol>
            <p>
                Saya berharap dapat diberikan kesempatan untuk wawancara agar saya dapat menjelaskan lebih detail mengenai potensi saya.
            </p>
            <p>Demikian surat lamaran ini saya buat dengan sebenar-benarnya. Atas perhatian dan kesempatannya, saya ucapkan terima kasih.</p>
        </div>

        <div class="ttd">
            <p>Hormat saya,</p>
            <p><?php echo e(Auth::guard('alumni')->alum->nama_alumni); ?></p>
        </div>
    </div>
</div>


<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script>
    document.getElementById("downloadWord").addEventListener("click", function () {
        var content = document.getElementById("contentToExport").innerHTML;
    
        var preHtml = "<html><head><meta charset='utf-8'></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + content + postHtml;
    
        var blob = new Blob(['\ufeff', html], { type: 'application/msword' });
    
        var url = URL.createObjectURL(blob);
        var link = document.createElement("a");
        link.href = url;
        link.download = "Surat_Lamaran.doc";
    
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
</script>
<script>
    document.getElementById("downloadWordd").addEventListener("click", function () {
        var content = document.getElementById("contentToExportt").innerHTML;
    
        var preHtml = "<html><head><meta charset='utf-8'></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + content + postHtml;
    
        var blob = new Blob(['\ufeff', html], { type: 'application/msword' });
    
        var url = URL.createObjectURL(blob);
        var link = document.createElement("a");
        link.href = url;
        link.download = "cv.doc";
    
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
</script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\baruuu\tracking-alumni (1)\resources\views/alumni/lamaran.blade.php ENDPATH**/ ?>