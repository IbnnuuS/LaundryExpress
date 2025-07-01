<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Laundry Express</title>
    <link rel="shortcut icon" href="{{ asset('template/assets') }}/compiled/svg/favicon.png" type="image/x-icon">
    <link rel="stylesheet" crossorigin href="{{ asset('template/assets') }}/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="{{ asset('template/assets') }}/compiled/css/app-dark.css">
    <link rel="stylesheet" crossorigin href="{{ asset('template/assets') }}/compiled/css/auth.css">
</head>

<body>
    <script src="{{ asset('template/assets') }}/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Daftar</h1>
                    <p class="auth-subtitle mb-5">Masukkan data Anda untuk mendaftar ke situs web kami.</p>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="fullname" class="form-control form-control-xl"
                                placeholder="Nama Lengkap" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl"
                                placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password_confirmation" class="form-control form-control-xl"
                                placeholder="Confirm Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah memiliki akun? <a href="{{ url('/login') }}"
                                class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block p-0">
                <div id="auth-right"
                    style="background-image: url('{{ asset('template/assets/compiled/svg/login-bg.png') }}');
               background-repeat: no-repeat;
               background-size: contain;
               background-position: center;
               height: 100vh;
               width: 100%;
               background-color: #f8f9fa;">
                </div>
            </div>

        </div>

    </div>
</body>

</html>
