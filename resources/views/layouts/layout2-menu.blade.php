<header class="block-ctr pad-20 main-header">
    <div class="max-w">
        <a href="{{ route('homeByLang', ['lang' => \App::getLocale()]) }}" class="left logo-container">
            <img class="logo intro-logo svg" src="/images/BC2-Logo.png" alt="BC2" title="BC2">
        </a>
        <div class="right icon-container icon-container-menu">
            <span class="icon icon-menu"></span>
        </div>
        <div class="right header-rgt desk-menu">
            <nav class="right">

            </nav>
        </div>
        <!-- MOBILE MENU -->
        <section class="block container pad-20 txt-white mob-menu-container">
            <nav class="mob-nav">
                <ul class="list mob-menu">
                    <li class="list-item list-title">
                        @lang('blog.categorias')
                    </li>
                    <li class="list-item">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'legal']) }}">@lang('blog.submenu_leg')</a>
                    </li>
                    <li class="list-item">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'financiera']) }}">@lang('blog.submenu_fin')</a>
                    </li>
                    <li class="list-item">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'corporativa']) }}">@lang('blog.submenu_cor')</a>
                    </li>
                    <li class="list-item">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'economia']) }}">@lang('blog.submenu_eco')</a>
                    </li>
                    <li class="list-item">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'fiscal']) }}">@lang('blog.submenu_fis')</a>
                    </li>
                </ul>
            </nav>
            <div class="main-nav-aside" style="padding-top: 10px">
                <a href="{{ route('contact_us', ['lang' => \App::getLocale()]) }}" class="mob-contacto">@lang('blog.menu_contacto')</a>
                <a href="/es{{ substr(\Request::path(),2) }}" class="btn-sm">ESP</a> |
                <a href="/en{{ substr(\Request::path(),2) }}" class="btn-sm">ENG</a> |
                <a href="/cn{{ substr(\Request::path(),2) }}" class="btn-sm">中國</a>
                <div class="lang-select">

                    {{--<a href="#" class="btn-lang">@lang('blog.lenguaje')</a>--}}
                    {{--<ul class="list list-lang">--}}
                        {{--<li>--}}
                            {{--<a href="/es{{ substr(\Request::path(),2) }}">Español</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/en{{ substr(\Request::path(),2) }}">English</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="/cn{{ substr(\Request::path(),2) }}">中文简体</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </section>
        <!-- /MOBILE MENU -->
    </div>
</header>