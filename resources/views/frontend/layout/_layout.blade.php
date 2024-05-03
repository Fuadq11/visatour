<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title') - visatour.az</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LQ6FZ6RLLJ">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LQ6FZ6RLLJ');
</script>
    @yield('meta')

    @include('frontend.partials._css')
</head>


<body id="main-homepage">

<div class="wrapper">
    <!--====== LOADER =====-->
    <div class="preloader"></div>

    @include('frontend.partials._navbar')

    @yield('content')

    <!--======================= FOOTER =======================-->
    @include('frontend.partials._footer')

</div>

@include('frontend.partials._js')
@yield('js')
</body>
</html>