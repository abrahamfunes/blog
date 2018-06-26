<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120840110-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120840110-1');
    </script>

    @yield('metas')

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700" rel="stylesheet">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BC2</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="/css/main.css" />
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="/css/ie.css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


</head>
<body>
<!-- INTRO -->
@yield('header')
<!-- /INTRO -->


@yield('content')


<footer class="container full-width bg-blue pad-20 txt-center txt-white main-footer">
    <ul class="list list-social">
        {{--<li class="list-item">--}}
            {{--<a href="#">--}}
                {{--<img src="{!! config("app.url") !!}/images/icon-fb.png" alt="Facebook" title="Facebook" />--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="list-item">--}}
            {{--<a href="#">--}}
                {{--<img src="{!! config("app.url") !!}/images/icon-tw.png" alt="Twitter" title="Twitter" />--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
    <p>
        Copyright © <?php echo date("Y") ?> <a href="http://www.bc2.mx">bc2.mx</a>
    </p>
    <p>
        @lang('blog.derechos')
    </p>
</footer>
<!-- SCRIPTS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="/js/jquery.js"><\/script>');
    }
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.sticky.js"></script>
<!--<script type="text/javascript" src="js/jquery.scrollTo.js"></script>-->
<!-- /SCRIPTS -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.min.css') }}">
<script src="{{ URL::asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
@include('sweet::alert')

@yield('scripts')
</body>
</html>
