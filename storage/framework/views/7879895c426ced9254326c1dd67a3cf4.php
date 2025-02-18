<?php $__env->startSection('title', 'Lamaran - SMKN 1 Bantul'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contohlamaran.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Contoh Surat Lamaran dan CV'); ?>
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
                <span>Nama: [Nama Lengkap]</span><br>
                <span>Tempat, Tanggal Lahir: [Tempat, Tanggal]</span><br>
                <span>Alamat: [Alamat Lengkap]</span><br>
                <span>Nomor Telepon: [Nomor HP]</span><br>
                <span>Email: [Alamat Email]</span>
            </p>
        </div>
        <p>
            Mengajukan lamaran untuk posisi [Posisi yang Dilamar] di perusahaan yang Bapak/Ibu pimpin.
            Saya adalah alumni SMKN 1 Bantul jurusan [Nama Jurusan] tahun lulus [Tahun Lulus]. Saya memiliki kemampuan di bidang [keahlian utama] dan pengalaman [jika ada].
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
        <p>[Nama Lengkap]</p>
    </div>
</div>
<h1>Curriculum Vitae</h1>
<div class="cv-container">
    <div class="d-flex align-items-center mb-4">
        <!-- Foto -->
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSjkWNYkyTK94NswJwN5f4kUJ7eQMn2GJ7w&s" alt="Foto Profil">
        <h3>[Nama Lengkap]</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Data Diri -->
            <div class="section mb-4">
                <div class="section-title">Data Diri</div>
                <div class="section-content">
                    <p>Tempat, Tanggal Lahir: [Tempat, Tanggal]</p>
                    <p>Alamat: [Alamat Lengkap]</p>
                    <p>Nomor Telepon: [Nomor HP]</p>
                    <p>Email: [Alamat Email]</p>
                </div>
            </div>

            <!-- Pendidikan -->
            <div class="section mb-4">
                <div class="section-title">Riwayat Pendidikan</div>
                <div class="section-content">
                    <p>SMK N 1 Bantul - [Jurusan]</p>
                    <p>Lulus: [Tahun Lulus]</p>
                </div>
            </div>

            <!-- Keahlian -->
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
            <!-- Pengalaman Kerja -->
            <div class="section mb-4">
                <div class="section-title">Pengalaman Kerja</div>
                <ul class="experience-list">
                    <li><strong>[Posisi]</strong> - [Nama Perusahaan] (Tahun Mulai - Tahun Selesai)</li>
                    <li><strong>[Posisi]</strong> - [Nama Perusahaan] (Tahun Mulai - Tahun Selesai)</li>
                </ul>
            </div>

            <!-- Pengalaman Organisasi -->
            <div class="section mb-4">
                <div class="section-title">Pengalaman Organisasi</div>
                <ul class="experience-list">
                    <li><strong>[Jabatan]</strong> - [Nama Organisasi] (Tahun Mulai - Tahun Selesai)</li>
                    <li><strong>[Jabatan]</strong> - [Nama Organisasi] (Tahun Mulai - Tahun Selesai)</li>
                </ul>
            </div>

            <!-- Referensi -->
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/alumni/lamaran.blade.php ENDPATH**/ ?>