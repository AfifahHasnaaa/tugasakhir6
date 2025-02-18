<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <title>Login User</title>
    <link rel="shortcut icon" href="{{ asset('asset/logo/SMK_Negeri_1_Bantul.png') }}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <div class="form-containet">
        <div class="col col-1">
            <div class="image-layer">
                <img src="{{ asset('asset/logo/SMK_Negeri_1_Bantul.png') }}" class="form-image-main fi-2">
                <p>Selamat Datang di Website TrackMyAlumni SMKN 1 Bantul.</p>
            </div>
        </div>
        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-2" id="userButton"><a href="{{ route('login') }}">Alumni</a></button>
                <button class="btn btn-1" id="adminButton" style="background-color: #254e7a;"><a href="{{ route('login.admin') }}">Admin</a></button>
            </div>
            <!-- Form Login Alumni -->
            <form id="userForm" action="{{ route('login.alumni.process') }}" method="POST" class="login-user-form">
                @csrf
                <div class="form-title">
                    <span>Masuk</span>
                </div>
                @if($errors->has('error'))
                <div class="error-login">
                    {{ $errors->first('error') }}
                </div>
                @endif
                <div class="form-inputs">
                    <div class="input-box">
                        <input id="username" name="username" type="text" class="input-fields" placeholder="Nama Pengguna/Email" value="{{ old('username') }}" required autocomplete="username">
                        <i class='bx bx-user icon'></i>
                    </div>
                    <div class="input-box">
                        <input id="password" name="password" type="password" class="input-fields" value="{{ old('password') }}" placeholder="Kata Sandi" required>
                        <button type="button" id="togglePassword" class="btn-show-password">
                            <i class='bx bx-hide icon'></i>
                        </button>
                    </div>
                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>
                    <div class="input-boxs">
                            <button class="input-submit">
                                <span>Masuk</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                            <button class="hubungi">
                                <a href=""><i class="bx bx-user"></i></a>
                            </button>   
                    </div>
                    <div class="forget-pass">
                        <p id="loginText">Belum Punya Akun? <a href="{{ route('register') }}">Daftar</a></p>
                    </div>
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
</script>