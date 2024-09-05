
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>فروشگاه</title>
    <link href="images/favicon.ico" rel="icon">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/tooltipster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/revolution/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/revolution/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/rtl.css') }}">
</head>
<body>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="cssload-loader"></div>
    </div>
</div>
<!--PreLoader Ends-->
<!-- header -->
@include('partials.front.header')
<!-- header -->
<!--Page Header-->

@yield('content')

<!-- Contact US ends -->
<!--Site Footer Here-->
@include('partials.front.footer')
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
<!--Bootstrap Core-->
<script src="{{ asset('front/js/propper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<!--to view items on reach-->
<script src="{{ asset('front/js/jquery.appear.js') }}"></script>
<!--Owl Slider-->
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<!--number counters-->
<script src="{{ asset('front/js/jquery-countTo.js') }}"></script>
<!--Parallax Background-->
<script src="{{ asset('front/js/parallaxie.js') }}"></script>
<!--Cubefolio Gallery-->
<script src="{{ asset('front/js/jquery.cubeportfolio.min.js') }}"></script>
<!--Fancybox js-->
<script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
<!--tooltip js-->
<script src="{{ asset('front/js/tooltipster.min.js') }}"></script>
<!--wow js-->
<script src="{{ asset('front/js/wow.js') }}"></script>
<!--Revolution SLider-->
<script src="{{ asset('front/js/revolution/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front/js/revolution/extensions/revolution.extension.video.min.js') }}"></script>
<!--custom functions and script-->
<script src="{{ asset('front/js/functions.js') }}"></script>
</body>
</html>
