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
                        {{--<li>--}}
                            {{--<a href="#" class="twitter-icon">--}}
                                {{--<i class="fa fa-twitter"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/#" class="instagram-icon">--}}
                                {{--<i class="fa fa-instagram"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#" class="facebook-icon">--}}
                                {{--<i class="fa fa-facebook"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
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
                                <li class="{{ Request::is(\App::getLocale()) || Request::is('blog*') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}">@lang('blog.menu_inicio')</a>
                                </li>
                                <li class="{{ Request::is('*nosotros') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('about_us', ['lang' => \App::getLocale()]) }}">@lang('blog.menu_nosotros')</a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('blog.blog')
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li style="display: grid !important;">
                                            <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}?cat=1" style="padding: 14px !important;">@lang('blog.submenu_leg')</a>
                                        </li>
                                        <li style="display: grid !important;">
                                            <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}?cat=2" style="padding: 14px !important;">@lang('blog.submenu_fin')</a>
                                        </li>
                                        <li style="display: grid !important;">
                                            <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}?cat=3" style="padding: 14px !important;">@lang('blog.submenu_cor')</a>
                                        </li>
                                        <li style="display: grid !important;">
                                            <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}?cat=9" style="padding: 14px !important;">@lang('blog.submenu_eco')</a>
                                        </li>
                                        <li style="display: grid !important;">
                                            <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}?cat=10" style="padding: 14px !important;">@lang('blog.submenu_fis')</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('*noticias') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('noticias', ['lang' => \App::getLocale()]) }}">@lang('blog.menu_noticias')</a>
                                </li>
                                <li class="{{ Request::is('*contacto') ? 'active' : '' }}">
                                    <a class="page-scroll" href="{{ route('contact_us', ['lang' => \App::getLocale()]) }}">@lang('blog.menu_contacto')</a>
                                </li>
                                <li>
                                    <select class="selectpicker" data-width="fit" style="width: 100%; color: #000; background-color: #fff; padding: 0px 13px;" id="country">
                                        <option data-content='<span class="flag-icon flag-icon-mx"></span> Español' style="padding: 0px !important; background-color: #fff; color: #000;" value="es" @if(\App::getLocale() == 'es') selected @endif>Español</option>
                                        <option data-content='<span class="flag-icon flag-icon-us"></span> English' style="padding: 0px !important; background-color: #fff; color: #000;" value="en" @if(\App::getLocale() == 'en') selected @endif>English</option>
                                        <option data-content='<span class="flag-icon flag-icon-cn"></span> 中文简体' style="padding: 0px !important; background-color: #fff; color: #000;" value="cn" @if(\App::getLocale() == 'cn') selected @endif>中文简体</option>
                                    </select>
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
