<?php $__env->startSection('title', 'Info - SMKN 1 Bantul'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/tentang.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('konten'); ?>
<?php $__env->startSection('judul','Info'); ?>
<div class="petunjuk">
    <div class="accordion">
        <div class="accordion-header">
            <i class="bi bi-pen icon"></i>
            Pengisian Biodata
        </div>
        <div class="accordion-body">
            <ul>
                <li>Silahkan lakukan pendaftaran diri dengan klik tombol daftar jika anda belum masuk dalam list data alumni.</li>
                <li>Kemudian lakukan pengisian data diri di form alumni.</li>
                <li>Setiap alumni diharapkan wajib memberikan data yang sebenarnya.</li>
                <li>Setiap alumni hanya boleh melakukan satu kali pendataan dan pastikan dahulu nama anda belum masuk ke dalam list/daftar alumni sebelum mendaftar dengan menggunakan fitur pencarian yang berada pada menu Data Alumni.</li>
                <li>Sebelum mengklik tombol Tambah Data pastikan kembali isian anda.</li>
            </ul>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">
            <i class="bi bi-question-lg icon"></i>
            Informasi dan Pertanyaan
        </div>
        <div class="accordion-body">
            <p>Untuk informasi dan pertanyaan lebih lanjut, hubungi pihak sekolah melalui nomor telepon atau email yang tertera di bawah ini.</p>
            <ul>
                <li>
                    <i class="fas fa-phone"></i> <a href="tel:(0274) 367156">(0274) 367156</a>
                </li>
                <li>
                    <i class="fas fa-envelope"></i> <a href="mailto:semeanbtl@yahoo.com">semeanbtl@yahoo.com</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="accordion">
        <div class="accordion-header">
            <i class="fab fa-telegram-plane icon"></i>
            Link Telegram
        </div>
        <div class="accordion-body">
            <a href="https://t.me/+5KAqZsNWEShhMTdl" style="font-weight: bold; text-decoration: underline; color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));">Alumni SMKN 1 Bantul</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    const closeAllAccordions = () => {
        document.querySelectorAll('.accordion').forEach(accordion => {
            accordion.classList.remove('active');
        });
    };

    document.addEventListener('DOMContentLoaded', () => {
        const firstAccordion = document.querySelector('.accordion');
        firstAccordion.classList.add('active');
    });

    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const accordion = header.parentElement;

            if (accordion.classList.contains('active')) {
                accordion.classList.remove('active');
            } else {
                closeAllAccordions();
                accordion.classList.add('active');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.alumniLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/alumni/tentang.blade.php ENDPATH**/ ?>