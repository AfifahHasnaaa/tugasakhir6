<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <title>Login User</title>
    <link rel="shortcut icon" href="<?php echo e(asset('asset/logo/SMK_Negeri_1_Bantul.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>

<body>
    <div class="form-containet">
        <div class="col col-1">
            <div class="image-layer">
                <img src="<?php echo e(asset('asset/logo/SMK_Negeri_1_Bantul.png')); ?>" class="form-image-main fi-2">
                <p>Selamat Datang di Website TrackMyAlumni SMKN 1 Bantul.</p>
            </div>
        </div>
        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-2" id="userButton" style="background-color: #254e7a;"><a href="<?php echo e(route('login')); ?>">Alumni</a></button>
                <button class="btn btn-1" id="adminButton"><a href="<?php echo e(route('login.admin')); ?>">Admin</a></button>
            </div>

            <!-- Form Login Admin-->
            <form id="adminForm" action="<?php echo e(route('login.admin.process')); ?>" method="POST" class="login-admin-form">
                <?php echo csrf_field(); ?>
                <div class="form-title">
                    <span>Masuk</span>
                </div>
                <?php if($errors->has('error')): ?>
                <div class="error-login">
                    <?php echo e($errors->first('error')); ?>

                </div>
                <?php endif; ?>
                <div class="form-inputs">
                    <div class="input-box">
                        <input id="username" name="username" type="text" class="input-fields" placeholder="Nama Pengguna/Email" value="<?php echo e(old('username')); ?>" required autocomplete="username">
                        <i class='bx bx-user icon'></i>
                    </div>
                    <div class="input-box">
                        <input id="password" name="password" type="password" class="input-fields" placeholder="Kata Sandi" value="<?php echo e(old('password')); ?>" required>
                        <button type="button" id="togglePassword" class="btn-show-password">
                            <i class='bx bx-hide icon'></i>
                        </button>
                    </div>
                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></div>
                    </div>
                    <div class="input-box">
                        <button class="input-submit">
                            <span>Masuk</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const captchaResponse = document.querySelector('#g-recaptcha-response').value;

        if (!captchaResponse) {
            event.preventDefault();
            alert("Silakan centang reCAPTCHA terlebih dahulu.");
        }
    });
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/loginadmin.blade.php ENDPATH**/ ?>