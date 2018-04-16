@if (Auth::check() == false)
    <script>window.location = '/';</script>
@endif
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Bc2.mx</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">


    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2-v2.css')}}">



    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <span class="logo-mini"><b></b>Bc2</span>
                <span class="logo-lg">Admin <b>Bc2</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu" title="Ver Pagina" alt="Ver Pagina">
                            <a href="{{ url('/') }}" target="_blank" data-toggle="tooltip" title="Ver Pagina">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/images/user.png"
                                     class="user-image" alt="User Image"/>
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/images/user.png"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Activo desde {!! Auth::user()->created_at !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        {{--<a href="#" class="btn btn-default btn-flat">Mi Perfil</a>--}}
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! route('logout') !!}" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2017 <a href="bc2.mx">bc2.mx</a>.</strong> Todos los derechos reservados.
        </footer>

    </div>
@endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    <!-- AdminLTE App -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/plugins/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.es-ES.js"></script>
    <script src="/plugins/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.en-US.js"></script>
    <script src="/plugins/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.zh-CN.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.js"></script>
    <script src="{{ URL::asset('plugins/sweetalert2/sweetalert2-v2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".filestyle2").filestyle({
                input: false,
                buttonName: "btn-primary",
                buttonText: "Seleccione",
                size: "sm",
                iconName: "fa fa-file-text-o"
            });

            $('div.alert').not('.alert-important').delay(3000).slideUp();
        });

        $(".select2").select2({language: "es"});

        $(".description").wysihtml5({
            locale: 'es-ES',
            toolbar: {
                "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false, //Button to change color of font
                "blockquote": true //Blockquote
            }
        });

        $(".descriptionen").wysihtml5({
            locale: 'en-US',
            toolbar: {
                "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false, //Button to change color of font
                "blockquote": true //Blockquote
            }
        });

        $(".descriptioncn").wysihtml5({
            locale: 'zh-CN',
            toolbar: {
                "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false, //Button to change color of font
                "blockquote": true //Blockquote
            }
        });

        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "es",
            autoclose: true,
            orientation: 'bottom auto'
        });
    </script>

    @yield('scripts')
</body>
</html>