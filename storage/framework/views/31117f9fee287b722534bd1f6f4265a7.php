<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Internal Server Error</title>
</head>
<style>
    body {
        background-color: #f0f0f0;
        font-family: sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        text-align: center;
    }

    h1 {
        font-size: 100px;
        color: #254e7a;
        margin: 0;
    }

    p {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
    }

    button {
        background-color: #254e7a;
        color: white;
        padding: 15px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover{
        background-color: #5584b0;
    }

    a {
        color: inherit;
        text-decoration: none;
    }
</style>

<body>
    <div class="container">
        <h1>500</h1>
        <h2>INTERNAL SERVER ERROR</h2>
        <P>Kami mengalami masalah tak terduga. Silakan coba lagi dalam beberapa saat atau hubungi dukungan jika masalah terus berlanjut.</P>
        <button ><a href="<?php echo e(url()->previous()); ?>" class="button">Kembali ke Halaman Sebelumnya</a></button>
        <p>@2024 SMK N 1 Bantul, All Right Reserved</p>
    </div>
</body>

</html><?php /**PATH D:\tracking-alumni\tracking-alumni\resources\views/errors/500.blade.php ENDPATH**/ ?>