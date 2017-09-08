<!DOCTYPE html>
<html class="no-js" lang="es" ng-app="lanixApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Bc2.mx') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/favicon.ico">
    {{--<link rel="shortcut icon" href="/favicon.ico" />--}}

<style>
    .max-lines {
        display: block; /* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }
    .flicker-img{
        min-height: 95px;
    }
</style>
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="/lib/css/nivo-slider.css" />
    <link rel="stylesheet" href="/lib/css/preview.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/lib/css/style.css" type="text/css" media="screen" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="/css/venobox.css">
    <!-- video css -->
    <link rel="stylesheet" href="/css/vide.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">

    <!-- modernizr css -->
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body data-spy="scroll" data-target="#navbar-example">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="preloader"></div>

@include('layouts.header')
@yield('banner')

@yield('content')

<!-- End Blog Area -->
<div class="clearfix"></div>
<!-- Start Footer bottom Area -->

@include('layouts.footer')


<!-- all js here -->
<!-- jquery latest version -->
<script src="/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap js -->
<script src="/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="/js/owl.carousel.min.js"></script>
<!-- venobox js -->
<script src="/js/venobox.min.js"></script>
<!-- knob js -->
<script src="/js/jquery.knob.js"></script>
<!-- wow js -->
<script src="/js/wow.min.js"></script>
<!-- parallax js -->
<script src="/js/parralax.js"></script>
<!-- Form validator js -->
<script src="/js/form-validator.min.js"></script>
<!-- jquery.appear js -->
<script src="/js/jquery.appear.js"></script>
<!-- ytplayer js -->
<script src="/js/ytplayer.min.js"></script>
<!-- easing js -->
<script src="/js/easing.js"></script>
<!-- Nivo slider js -->
<script src="/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="/lib/home.js" type="text/javascript"></script>
<!-- isotope js -->
<script src="/js/isotope.pkgd.min.js"></script>
<!-- plugins js -->
<script src="/js/plugins.js"></script>
<!-- main js -->
<script src="/js/main.js"></script>

<link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.min.css') }}">
<script src="{{ URL::asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
@include('sweet::alert')

@yield('styles')

@yield('scripts')
</body>

</html>