<!DOCTYPE html>
<html lang="az">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="visatour admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, visatour admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Taleh Orucov">
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <title>Admin - Giriş</title>
    <!-- Google font-->
    @include('backend.partials._css')
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center"
                    src="{{ asset('backend/assets/images/login/2.jpg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo text-start" href="{{ route('admin.login') }}">
                                <img class="img-fluid for-light"
                                    src="{{ asset('backend/images/logo.webp') }}" alt="looginpage">
                                <img class="img-fluid for-dark"
                                    src="{{ asset('backend/images/logo.webp') }}" alt="looginpage">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <h4>Hesabınıza giriş edin</h4>
                                <p>Giriş etmək üçün email və şifrənizi daxil edin</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input name="email" class="form-control" type="email" required
                                        placeholder="Test@gmail.com">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Şifrə</label>
                                    <div class="form-input position-relative">
                                        <input name="password" class="form-control" type="password" required
                                            placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if ($message = session('error'))
                                    <span class="text-danger">{{ $message }}</span>
                                @endif
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Daxil Ol</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('backend/assets/js/jquery-3.5.1.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ asset('backend/assets/js/config.js') }}"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ asset('backend/assets/js/script.js') }}"></script>
    </div>
</body>

</html>
