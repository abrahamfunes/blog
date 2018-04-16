
@extends('layouts.layout2')

<?php

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

?>

@section('header')
    <section class="container bg-dark pad-bot-15 txt-white">
        @include('layouts.layout2-menu')
        <div class="clear"></div>
    </section>
@endsection

@section('content')
    <!-- DESTACADAS -->
    @if(count($posts) > 0)
    <section class="container bg-white pad-20 col-3 publicaciones-destacadas ultimas-publicaciones">
        <div class="max-w">
            <hgroup class="txt-center txt-gray sec-title">
                <h2 class="txt-blue">@if(\App::getLocale() == 'es') {{ $category->name  }} @elseif(\App::getLocale() == 'en') {{  $category->name_en}} @elseif(\App::getLocale() == 'cn') {{$category->name_cn}} @else {{$category->name }}@endif</h2>
            </hgroup>
            <ul class="list list-destacadas">
                @if(count($posts) >= 1)
                <li class="list-item prev-noticia dest-left">
                    <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($category->name), 'post_id' => $posts[0]->id]) }}" class="pub-thumb">
                        <img src="{{ ($posts[0]->file != "") ? $posts[0]->file->path : "/img/blog/1.jpg" }}" alt="{{ $posts[0]->title }}" title="{{ $posts[0]->title }}" />
                    </a>
                    <h1>
                        <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($posts[0]->category->name), 'post_id' => $posts[0]->id]) }}">
                            @if(\App::getLocale() == 'es') {{ $posts[0]->title  }} @elseif(\App::getLocale() == 'en') {{  $posts[0]->title_en }} @elseif(\App::getLocale() == 'cn') {{$posts[0]->title_cn}} @else {{$posts[0]->title }}@endif
                        </a>
                    </h1>
                    <p>
                        @if(\App::getLocale() == 'es') {{ substr(strip_tags($posts[0]->content), 0, 150)  }} @elseif(\App::getLocale() == 'en' && $posts[0]->content_en != "") {{  substr(strip_tags($posts[0]->content_en), 0, 150) }} @elseif(\App::getLocale() == 'cn' && $posts[0]->content_cn != "") {{ substr(strip_tags($posts[0]->content_cn), 0, 150) }} @else {{ substr(strip_tags($posts[0]->content), 0, 150) }}@endif
                    </p>
                    <ul class="single-cat-list">
                        <li class="list-item cat-link">
                            <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($posts[0]->category->name)]) }}">@if(\App::getLocale() == 'es') {{$posts[0]->category->name}} @elseif(\App::getLocale() == 'en') {{$posts[0]->category->name_en}} @else {{$posts[0]->category->name_cn }}@endif</a>
                        </li>
                    </ul>
                    <?php $date = new DateTime(substr($posts[0]->created_at, 0, 10)); ?>
                    <span class="date txt-gray">{{ $date->format('d \d\e\ M, Y') }}</span>
                </li>
                @endif
                <div class="dest-right">
                    @if(count($posts) >= 2)
                    <li class="list-item prev-noticia">
                        <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($category->name), 'post_id' => $posts[1]->id]) }}" class="pub-thumb">
                            <img src="{{ ($posts[1]->file != "") ? $posts[1]->file->path : "/img/blog/1.jpg" }}" alt="{{ $posts[1]->title }}" title="{{ $posts[1]->title }}" />
                        </a>
                        <div class="info-prev">
                            <h1>
                                <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($category->name), 'post_id' => $posts[1]->id]) }}">
                                    @if(\App::getLocale() == 'es') {{ $posts[1]->title  }} @elseif(\App::getLocale() == 'en') {{  $posts[1]->title_en }} @elseif(\App::getLocale() == 'cn') {{$posts[1]->title_cn}} @else {{$posts[1]->title }}@endif
                                </a>
                            </h1>
                            <p>
                                @if(\App::getLocale() == 'es') {{ substr(strip_tags($posts[1]->content), 0, 100)  }} @elseif(\App::getLocale() == 'en' && $posts[1]->content_en != "") {{  substr(strip_tags($posts[1]->content_en), 0, 100) }} @elseif(\App::getLocale() == 'cn' && $posts[1]->content_cn != "") {{ substr(strip_tags($posts[1]->content_cn), 0, 100) }} @else {{ substr(strip_tags($posts[1]->content), 0, 100) }}@endif...
                            </p>
                            <ul class="single-cat-list">
                                <li class="list-item cat-link">
                                    <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($posts[1]->category->name)]) }}">
                                        @if(\App::getLocale() == 'es') {{$posts[1]->category->name}} @elseif(\App::getLocale() == 'en') {{$posts[1]->category->name_en}} @else {{$posts[1]->category->name_cn }}@endif
                                    </a>
                                </li>
                            </ul>
                            <?php $date = new DateTime(substr($posts[1]->created_at, 0, 10)); ?>
                            <span class="date txt-gray">{{ $date->format('d \d\e\ M, Y') }}</span>
                        </div>
                    </li>
                    @endif
                        @if(count($posts) >= 3)
                    <li class="list-item prev-noticia">
                        <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($category->name), 'post_id' => $posts[2]->id]) }}" class="pub-thumb">
                            <img src="{{ ($posts[2]->file != "") ? $posts[2]->file->path : "/img/blog/1.jpg" }}" alt="{{ $posts[2]->title }}" title="{{ $posts[2]->title }}" />
                        </a>
                        <div class="info-prev">
                            <h1>
                                <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($category->name), 'post_id' => $posts[2]->id]) }}">
                                    @if(\App::getLocale() == 'es') {{ $posts[2]->title  }} @elseif(\App::getLocale() == 'en') {{  $posts[2]->title_en }} @elseif(\App::getLocale() == 'cn') {{$posts[2]->title_cn}} @else {{$posts[2]->title }}@endif
                                </a>
                            </h1>
                            <p>
                                @if(\App::getLocale() == 'es') {{ substr(strip_tags($posts[2]->content), 0, 100)  }} @elseif(\App::getLocale() == 'en' && $posts[2]->content_en != "") {{  substr(strip_tags($posts[2]->content_en), 0, 100) }} @elseif(\App::getLocale() == 'cn' && $posts[2]->content_cn != "") {{ substr(strip_tags($posts[2]->content_cn), 0, 100) }} @else {{ substr(strip_tags($posts[2]->content), 0, 100) }}@endif...
                            </p>
                            <ul class="single-cat-list">
                                <li class="list-item cat-link">
                                    <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($posts[2]->category->name)]) }}">
                                        @if(\App::getLocale() == 'es') {{$posts[2]->category->name}} @elseif(\App::getLocale() == 'en') {{$posts[2]->category->name_en}} @else {{$posts[2]->category->name_cn }}@endif
                                    </a>
                                </li>
                            </ul>
                            <?php $date = new DateTime(substr($posts[2]->created_at, 0, 10)); ?>
                            <span class="date txt-gray">{{ $date->format('d \d\e\ M, Y') }}</span>
                        </div>
                    </li>
                        @endif
                </div>
            </ul>
        </div>
    </section>
    @endif
    <!-- /DESTACADAS -->
    <!-- PUBLICACIONES RECIENTES -->

    <section class="container full-width bg-gray pad-60 publicaciones-recientes">
        <div class="max-w">
            <h5 class="txt-center txt-gray gray-title">@lang('blog.publicaciones')</h5>
            <ul class="container-recientes">
                @foreach($posts as $key => $post)
                    @if($key > 2)
                        <li>
                            <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}" class="left pub-thumb">
                                <img src="{{ ($post->file != "") ? $post->file->path : "/img/blog/1.jpg" }}" alt="{{ (\App::getLocale() == 'es') ? $post->title : (\App::getLocale() == 'en') ? $post->title_en : $post->title_cn }}" title="{{ (\App::getLocale() == 'es') ? $post->title : (\App::getLocale() == 'en') ? $post->title_en : $post->title_cn }}" style="min-height: 122px; max-height: 122px" />
                            </a>
                            <div class="right">
                                <h1>
                                    <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}">
                                        @if(\App::getLocale() == 'es') {{ $post->title  }} @elseif(\App::getLocale() == 'en' && $post->title_en != '') {{  $post->title_en }} @elseif(\App::getLocale() == 'cn' && $post->title_cn != '') {{$post->title_cn}} @else {{$post->title }}@endif
                                    </a>
                                </h1>
                                <p>
                                    {{ substr(strip_tags($post->content), 0, 140) }}
                                </p>
                                <ul class="single-cat-list">
                                    <li class="list-item cat-link">
                                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name)]) }}">@if(\App::getLocale() == 'en') {!! $post->category->name_en !!} @elseif(\App::getLocale() == 'cn') {!! $post->category->name_cn !!} @else {!! $post->category->name !!} @endif</a>
                                    </li>
                                </ul>
                                <?php $date = new DateTime(substr($post->created_at, 0, 10)); ?>
                                <span class="date txt-gray">{{ $date->format('d \d\e\ M, Y') }}</span>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
            {{--<a href="#" class="underline txt-center txt-gray btn-mas">Ver Más</a>--}}
        </div>
    </section>
    <!-- /PUBLICACIONES RECIENTES -->
@endsection
