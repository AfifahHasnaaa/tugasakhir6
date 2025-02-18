<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <title>Daftar Akun</title>
    <link rel='shortcut icon' href='asset/logo/SMK_Negeri_1_Bantul.png'>
    <link rel="stylesheet" href="<?php echo e(asset('css/daftar.css')); ?>">
</head>

<body>
    <div class="form-containet">
        <div class="col col-1">
            <div class="image-layer">
                <img src="asset/logo/SMK_Negeri_1_Bantul.png" class="form-image-main fi-2">
                <p>Selamat Datang di Website TrackMyAlumni SMKN 1 Bantul. </p>
            </div>
        </div>
        <div class="col col-2">
            <div class="daftar-form align">
                <div class="form-title">
                    <span>Daftar</span>
                </div>
                <form action="<?php echo e(route('register.process')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-box">
                        <input id="username" name="username" type="text" class="input-fields <?php echo e($errors->has('username') ? 'input-error' : ''); ?>" placeholder="Username" value="<?php echo e($errors->has('username') ? '' : old('username')); ?>" required>
                        <i class='bx bx-user icon'></i>
                    </div>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-daftar"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-box">
                        <input id="email" name="email" type="email" class="input-fields <?php echo e($errors->has('email') ? 'input-error' : ''); ?>" placeholder="Email" value="<?php echo e($errors->has('email') ? '' : old('email')); ?>" required>
                        <i class='bx bx-envelope icon'></i>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-daftar"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-box">
                        <input id="password" name="password" type="password" class="input-fields <?php echo e($errors->has('password') ? 'input-error' : ''); ?>" placeholder="Kata Sandi" value="<?php echo e($errors->has('password') ? '' : old('password')); ?>" required>
                        <button type="button" id="togglePassword" class="btn-show-password">
                            <i class='bx bx-hide icon'></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-daftar"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-box">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="input-fields <?php echo e($errors->has('password_confirmation') ? 'input-error' : ''); ?>" placeholder="Konfirmasi Kata Sandi" value="<?php echo e($errors->has('password_confirmation') ? '' : old('password_confirmation')); ?>" required>
                        <button type="button" id="togglePassword2" class="btn-show-password">
                            <i class='bx bx-hide icon'></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error-daftar"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></div>
                    </div>
                    <div class="input-box">
                        <button class="input-submit">
                            <span>Daftar</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                    <div class="forget-pass">
                        <p href="#">Sudah Mempunyai Akun? <a href="<?php echo e(url('login')); ?>">Masuk</a></p>
                    </div>
                </form>
            </div>
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

    const togglePasswordButton2 = document.getElementById('togglePassword2');
    const passwordConfirmationInput = document.getElementById('password_confirmation');

    togglePasswordButton2.addEventListener('click', function() {
        const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmationInput.setAttribute('type', type);

        this.innerHTML = type === 'password' ? '<i class="bx bx-hide icon"></i>' : '<i class="bx bx-show icon"></i>';
    });
</script><?php /**PATH C:\Users\HP\Documents\tracking-alumni\resources\views/daftar.blade.php ENDPATH**/ ?>