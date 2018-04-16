@extends('layouts.layout')

@section('styles')
    <style>
        p {
            max-height: 150px;
        }
    </style>
@endsection

@section('banner')
        <!-- Start Bottom Header -->
<div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                            <h1 class="title2">Bc2.mx</h1>
                        </div>
                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                            <h2 class="title3">@lang('blog.blog')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
@endsection

@section('content')
<div class="blog-page area-padding">
    <div class="container">
        <div class="row">
            {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">--}}
                {{--@include('layouts.layout-sidebar')--}}
            {{--</div>--}}
            <!-- End left sidebar -->
            <!-- Start single blog -->
            <div class="col-md-12 col-sm-12 col-xs-12">

                    @if(isset($category->id) != "")
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1>{{ $category->name }}</h1>
                        </div>
                    </div>
                    @endif
                    @foreach($posts as $post)
                        <?php
                            if(\App::getLocale() == 'en' && $post->title_en != ''){
                                $post->title = $post->title_en;
                                $post->content = $post->content_en;
                            }elseif(\App::getLocale() == 'cn' && $post->title_cn != ''){
                                $post->title = $post->title_cn;
                                $post->content = $post->content_cn;
                            }
                        ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img" style="min-height: 220px; max-height: 220px">
                                <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'post_id' => $post->id]) }}">
                                    <img src="{{ ($post->file != "") ? $post->file->path : "/img/blog/1.jpg" }}" alt="" style="max-height: 224px; height: auto; width: 100%">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="comments-type"><i class="fa fa-comment-o"></i><a href="/#"> {{ $post->comments()->count()}} @lang('blog.comentarios')</a></span>
                                <span class="date-type"><i class="fa fa-calendar"></i>{{ $post->created_at }}</span>
                            </div>
                            <div class="blog-text" style="min-height: 150px; text-align: justify">
                                <h4 style="min-height: 52px;">
                                    <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'post_id' => $post->id]) }}">{{ substr($post->title, 0, 90) }} @if(strlen($post->title) > 90)...@endif</a>
                                </h4>
                                    {!! substr($post->content, 0, 145)  !!}...
                            </div>
							<span><a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'post_id' => $post->id]) }}" class="ready-btn">@lang('blog.leer_mas')</a></span>
                        </div>
                    </div>
                    <!-- End single blog -->
                    @endforeach


                    {{--<div class="blog-pagination">--}}
                        {{--<ul class="pagination">--}}
                            {{--<li><a href="{{ $posts->firstItem() }}">&lt;</a></li>--}}
                            {{--<li class="active"><a href="/#">1</a></li>--}}
                            {{--<li><a href="/#">2</a></li>--}}
                            {{--<li><a href="/#">3</a></li>--}}
                            {{--<li><a href="/#">&gt;</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                        @include('pagination.default', ['paginator' => $posts])
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
