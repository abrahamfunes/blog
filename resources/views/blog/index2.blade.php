
@extends('layouts.layout2')

<?php

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

?>

@section('header')
    <section class="block container bg-dark txt-white intro">
        @include('layouts.layout2-menu')
        <div class="clear"></div>
    </section>
@endsection

@section('content')
    <!-- ACERCA -->
    <section class="clear pad-20 container acerca">
        <div class="block-ctr acerca txt-white txt-center col-md-3 text-center">
            <h1>@lang('blog.menu_nosotros')</h1>
            <p class="bg-white pad-20 acerca-txt">
                @lang('blog.footer_bc2')
            </p>
        </div>
    </section>
    <div class="bg-gray full-w pad-40 acerca-callto">
        <a href="#escritores" class="center btn btn-outline btn-blue btn-acerca">
            @lang('blog.mas_sobrenosotros')
        </a>
    </div>
    <!-- /ACERCA -->
    <!-- DESTACADAS -->
    <section class="container bg-white pad-20 col-3 publicaciones-destacadas">
        <div class="max-w">
            <h2>@lang('blog.publicaciones')</h2>
            {{--<ul class="col-3-list list list-destacadas">--}}
                @foreach($posts as $key => $post)
                    @if($key == 0)<ul class="col-3-list list list-destacadas"> @endif
                <li class="list-item prev-noticia">
                    <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}">
                        <img src="{{ ($post->file != "") ? $post->file->path : "/img/blog/1.jpg" }}" alt="{{ $post->title }}" title="{{ $post->title }}" style="min-height: 245px; max-height: 245px" />
                    </a>
                    <h1>
                        <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}">
                            @if(\App::getLocale() == 'es') {{ $post->title  }} @elseif(\App::getLocale() == 'en' && $post->title_en != '') {{  $post->title_en }} @elseif(\App::getLocale() == 'cn' && $post->title_cn != '') {{$post->title_cn}} @else {{$post->title }}@endif
                        </a>
                    </h1>
                    <ul class="single-cat-list">
                        <li class="list-item cat-link">
                            <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name)]) }}">@if(\App::getLocale() == 'es') {{ $post->category->name }} @elseif(\App::getLocale() == 'en') {{ $post->category->name_en}} @elseif(\App::getLocale() == 'cn') {{ $post->category->name_cn }} @endif</a>
                        </li>
                    </ul>
                    <?php $date = new DateTime(substr($post->created_at, 0, 10)); ?>
                    <span class="date txt-gray">{{ $date->format('d M, Y') }}</span>
                </li>
                        @if($key == 2)</ul><ul class="col-3-list list list-destacadas"> @endif
                @endforeach
            </ul>
        </div>
    </section>
    <!-- /DESTACADAS -->
    <?php if ( $detect->isMobile() ) { ?>
    <div class="hidden-md hidden-lg">
    <!-- CATEGORÍAS -->
    <section class="container full-width bg-white categorias">
        <div class="pad-20 max-w">
            <h2>@lang('blog.categorias')</h2>
        </div>
        <ul class="list cat-list">
            <li class="list-item cat-list-block cat-legal">
                <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'legal']) }}">
                    <div class="cat-title">
                        <h1 class="left">@lang('blog.submenu_leg')</h1>
                        <span class="right">+</span>
                    </div>
                </a>
            </li>
            <li class="list-item cat-list-block cat-financiera">
                <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'financiera']) }}">
                    <div class="cat-title">
                        <h1 class="left">@lang('blog.submenu_fin')</h1>
                        <span class="right">+</span>
                    </div>
                </a>
            </li>
            <li class="list-item cat-list-block cat-corporativa">
                <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'corporativa']) }}">
                    <div class="cat-title">
                        <h1 class="left">@lang('blog.submenu_cor')</h1>
                        <span class="right">+</span>
                    </div>
                </a>
            </li>
            <li class="list-item cat-list-block cat-economia">
                <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'corporativa']) }}">
                    <div class="cat-title">
                        <h1 class="left">@lang('blog.submenu_eco')</h1>
                        <span class="right">+</span>
                    </div>
                </a>
            </li>
            <li class="list-item cat-list-block cat-fiscal">
                <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => 'corporativa']) }}">
                    <div class="cat-title">
                        <h1 class="left">@lang('blog.submenu_fis')</h1>
                        <span class="right">+</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- /CATEGORÍAS -->
    </div>
    <?php } ?>
    <!-- EQUIPO -->
    <section class="container bg-white pad-20 col-4 equipo" id="escritores">
        {{--<div class="max-w">--}}
            {{--<h2>@lang('blog.quienes_somos')</h2>--}}
            {{--<ul class="list col-4-list list-equipo">--}}
                {{--<li class="list-item equipo-member">--}}
                    {{--<img src="images/equipo.jpg" alt="Carlos Sánchez" title="Carlos Sánchez" />--}}
                    {{--<hgroup class="equipo-nombre">--}}
                        {{--<h3>Carlos Sánchez</h3>--}}
                        {{--<h5>Avanta</h5>--}}
                        {{--<h4>Editor</h4>--}}
                    {{--</hgroup>--}}
                {{--</li>--}}
                {{--<li class="list-item equipo-member">--}}
                    {{--<img src="images/equipo.jpg" alt="Carlos Sánchez" title="Carlos Sánchez" />--}}
                    {{--<hgroup class="equipo-nombre">--}}
                        {{--<h3>Carlos Sánchez</h3>--}}
                        {{--<h5>Avanta</h5>--}}
                        {{--<h4>Editor</h4>--}}
                    {{--</hgroup>--}}
                {{--</li>--}}
                {{--<li class="list-item equipo-member">--}}
                    {{--<img src="images/equipo.jpg" alt="Carlos Sánchez" title="Carlos Sánchez" />--}}
                    {{--<hgroup class="equipo-nombre">--}}
                        {{--<h3>Carlos Sánchez</h3>--}}
                        {{--<h5>Avanta</h5>--}}
                        {{--<h4>Editor</h4>--}}
                    {{--</hgroup>--}}
                {{--</li>--}}
                {{--<li class="list-item equipo-member">--}}
                    {{--<img src="images/equipo.jpg" alt="Carlos Sánchez" title="Carlos Sánchez" />--}}
                    {{--<hgroup class="equipo-nombre">--}}
                        {{--<h3>Carlos Sánchez</h3>--}}
                        {{--<h5>Avanta</h5>--}}
                        {{--<h4>Editor</h4>--}}
                    {{--</hgroup>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </section>
    <!-- /EQUIPO -->
    <!-- RELACIONADOS -->
    <section class="container full-width bg-gray pad-60 proyectos-relacionados">
        <div class="max-w">
            <h2>@lang('blog.relacionados')</h2>
            <ul class="list list-proyectos">
                <li class="list-item proyecto-single">
                    <a href="http://bccasesores.com" target="_blank">
                        <img src="/images/logo-bcc.png" alt="BCC" title="BCC" />
                    </a>
                </li>
                <li class="list-item proyecto-single">
                    <a href="http://grupoavanta.mx" target="_blank">
                        <img src="/images/logo-avanta2.png" style="height: 140px; width: 140px" alt="Avanta" title="Avanta" />
                    </a>
                </li>
                <li class="list-item proyecto-single">
                    <a  href="http://fundaciondreamx.com" target="_blank">
                        <img src="/images/logo-dreamx.png" alt="DreaMX" title="DreaMX" />
                    </a>
                </li>
                <li class="list-item proyecto-single">
                    <a  href="http://impulsoraidea.com" target="_blank">
                        <img src="/images/logo-idea.png" alt="Idea" title="Idea" />
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- /RELACIONADOS -->

@endsection
