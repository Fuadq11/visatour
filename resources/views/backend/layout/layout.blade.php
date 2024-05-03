<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Taleh admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Taleh admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Taleh">
    <link rel="icon" href="{{ asset('backend/assets/images/visatour.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/visatour.png') }}" type="image/x-icon">
    <title>Admin - @yield('title')</title>

    @include('backend.partials._css')
    @yield('css')
</head>

<body onload="startTime()">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('backend.partials._header')
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('backend.partials._sidebar')
            <!-- Page Sidebar Ends-->
            @yield('content')
            <!-- footer start-->
            @include('backend.partials._footer')
        </div>
    </div>

    @include('backend.partials._js')
    @yield('js')
</body>

</html>
