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
                    <span>Nama: <?php echo e($alumnii->nama_alumni); ?></span><br>
                    <span>Tempat, Tanggal Lahir: <?php echo e($alumnii->tempat_lahir); ?>, <?php echo e($alumnii->tanggal_lahir); ?></span><br>
                    <span>Alamat: <?php echo e($alumnii->alamat); ?></span><br>
                    <span>Nomor Telepon: <?php echo e($alumnii->no_telepon); ?></span><br>
                    <span>Email: <?php echo e($alumnii->email); ?></span>
                </p>
            </div>
            <p>
                Mengajukan lamaran untuk posisi [Posisi yang Dilamar] di perusahaan yang Bapak/Ibu pimpin.
                Saya adalah alumni SMKN 1 Bantul jurusan <?php echo e($alumnii->jurusan); ?> tahun lulus <?php echo e($alumnii->tahun_lulus); ?>. Saya memiliki kemampuan di bidang [keahlian utama] dan pengalaman [jika ada].
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
            <p><?php echo e($alumnii->nama_alumni); ?></p>
        </div>
    </div>
</div>
<div id="contentToExportt">
    <h1>Curriculum Vitae</h1>
    <div class="cv-container">
        <div class="d-flex align-items-center mb-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSjkWNYkyTK94NswJwN5f4kUJ7eQMn2GJ7w&s" alt="Foto Profil">
            <h3><?php echo e($alumnii->nama_alumni); ?></h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="section mb-4">
                    <div class="section-title">Data Diri</div>
                    <div class="section-content">
                        <p>Tempat, Tanggal Lahir: <?php echo e($alumnii->tempat_lahir); ?>, <?php echo e($alumnii->tanggal_lahir); ?></p>
                        <p>Alamat: <?php echo e($alumnii->alamat); ?></p>
                        <p>Nomor Telepon: <?php echo e($alumnii->no_telepon); ?></p>
                        <p>Email: <?php echo e($alumnii->email); ?></p>
                    </div>
                </div>

                <div class="section mb-4">
                    <div class="section-title">Riwayat Pendidikan</div>
                    <div class="section-content">
                        <p>SMK N 1 Bantul - <?php echo e($alumnii->jurusan); ?></p>
                        <p>Lulus: <?php echo e($alumnii->tahun_lulus); ?></p>
                    </div>
                </div>

                <div class="section mb-4">
                    <div class="section-title">Keahlian</div>
                    <ul class="skills-list">
                        <li>[Keahlian 1]</li>
                        <li>[Keahlian 2]</li>
                        <li>[Keahlian 3]</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section mb-4">
                    <div class="section-title">Pengalaman Kerja</div>
                    <ul class="experience-list">
                        <li><strong>[Posisi]</strong> - [Nama Perusahaan] (Tahun Mulai - Tahun Selesai)</li>
                        <li><strong>[Posisi]</strong> - [Nama Perusahaan] (Tahun Mulai - Tahun Selesai)</li>
                    </ul>
                </div>

                <div class="section mb-4">
                    <div class="section-title">Pengalaman Organisasi</div>
                    <ul class="experience-list">
                        <li><strong>[Jabatan]</strong> - [Nama Organisasi] (Tahun Mulai - Tahun Selesai)</li>
                        <li><strong>[Jabatan]</strong> - [Nama Organisasi] (Tahun Mulai - Tahun Selesai)</li>
                    </ul>
                </div>

                <div class="section mb-4">
                    <div class="section-title">Referensi</div>
                    <div class="section-content">
                        <p>[Nama Referensi]</p>
                        <p>Jabatan: [Jabatan Referensi]</p>
                        <p>Kontak: [Nomor HP / Email Referensi]</p>
                    </div>
                </div>
            </div>
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

<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ThinKpad\Downloads\tracking-alumni (1)\resources\views/alumni/lamaran.blade.php ENDPATH**/ ?>