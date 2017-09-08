<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="top-right text-right hidden-xs hidden-sm">
                        {{--<li>--}}
                            {{--<a href="/#" class="instagram-linkdin">--}}
                                {{--<i class="fa fa-linkedin"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="#" class="twitter-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="/#" class="instagram-icon">--}}
                                {{--<i class="fa fa-instagram"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="#" class="facebook-icon">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Navigation -->
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Brand -->
                            <a class="navbar-brand page-scroll sticky-logo" href="/index.html">
                                <img src="/img/logo/logo.png" alt="">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="{{ Request::is('/') || Request::is('blog*') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('blog') }}">Inicio</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a class="page-scroll" href="/#about">About</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a class="page-scroll" href="/#feature">Feature</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a class="page-scroll" href="/#team">Team</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a class="page-scroll" href="/#portfolio">Portfolio</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a class="page-scroll" href="/#blog">Blog</a>--}}
                                {{--</li>--}}
                                <li class="{{ Request::is('contacto') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('contact_us') }}">Contacto</a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar-collapse -->
                    </nav>
                    <!-- END: Navigation -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-area end -->
</header>
<!-- header end -->
