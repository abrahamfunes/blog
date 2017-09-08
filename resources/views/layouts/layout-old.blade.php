<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" ng-app="lanixApp">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Bc2.mx') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="/favicon.ico" />


    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>



    <style>
        body {
            overflow-x: hidden !important;
        }
        .fotter_pegar{position:absolute; bottom:0;}
        .fotter_normal{float:left;}
        footer{ width:100%; height:190px; background:rgba(0,0,0,1.00); }
        .icon-bar {
            background: #F09F07 !important;
        }
    </style>

</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
@include('layouts.menu')

@yield('banner')
@yield('content2')
<div class="page-wrapper">
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle" style="background:#fff;">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper" style="background:#fff;">
                    <div class="page-content" style="background:#fff;">
                        <div class="container">
                            <div class="page-content-inner">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
    </div>

</div>
@yield('google_map')
<!-- BEGIN QUICK NAV -->
<div class="quick-nav-overlay"></div>

@yield('styles')

@yield('scripts')

@include('layouts.footer')
</body>
</html>