@extends('layouts.layout2')

@section('metas')
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="bc2.mx" />
    <meta property="og:title"         content="{{ $post->title }}" />
    <meta property="og:description"   content="{{ $post->title }}" />
    <meta property="og:image"         content="http://bc2.mx{{ ($post->file) ? $post->file->path : "" }}" />
@endsection


@section('scripts')
    <script>
        Responder = function (id){
            $("#father_comment_id").val(id);
        };

        $(document).ready(function() {
            document.title = 'Bc2.mx | {{ $post->title }}';
            //var new_url = get_short_url('{{ url()->current() }}', 'login', 'apikey');
            //alert(new_url);
            var tit=window.document.title;var tit2=encodeURIComponent(tit);

            var url = encodeURIComponent('{{ url()->current() }}');
            $("#share_fb").attr("href", 'https://www.facebook.com/sharer/sharer.php?u='+url+'&amp;src=sdkpreparse');
            $("#share_twitter").attr("href", 'https://twitter.com/share?text='+tit2+'&url={{ url()->current() }}&wrap_links=true');
        });

        function get_short_url(long_url, login, api_key)
        {
            $.getJSON(
                "http://api.bitly.com/v3/shorten?callback=?",
                {
                    "format": "json",
                    "apiKey": api_key,
                    "login": login,
                    "longUrl": long_url
                },
                function(response)
                {
                    console.log(response);
                    return(response.data.url);
                }
            );
        }
    </script>
@endsection

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
    <!-- ARTICLE -->
    <section class="container bg-white pad-60 col-2 single-article">
        <div class="max-w">
            <article class="main-content article">
                <h1>
                    @if(\App::getLocale() == 'es' && $post->title != '')
                        {!!  $post->title !!}
                    @elseif(\App::getLocale() == 'en' && $post->title_en != '')
                        {!!  $post->title_en !!}
                    @elseif(\App::getLocale() == 'cn' && $post->title_cn != '')
                        {!!  $post->title_cn !!}
                    @else
                        {!!  $post->title !!}
                    @endif
                </h1>
                <figure class="post-thumb">
                    <img src="{{ ($post->file != "") ? $post->file->path : "/img/blog/1.jpg" }}" alt="{{ $post->title }}" title="{{ $post->title }}" />
                    <figcaption class="txt-gray">
                        @if($post->image_url != '') @lang('blog.imagen_tomada') {{ $post->image_url }} @endif
                    </figcaption>
                </figure>
                <ul class="single-cat-list">
                    <li class="list-item cat-link">
                        <a href="{{ route('categoria', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name)]) }}">@if(\App::getLocale() == 'en') {!! $post->category->name_en !!} @elseif(\App::getLocale() == 'cn') {!! $post->category->name_cn !!} @else {!! $post->category->name !!} @endif</a>
                    </li>
                </ul>
                <?php $date = new DateTime(substr($post->created_at, 0, 10)); ?>
                <span class="date txt-gray">{{ $date->format('d \d\e\ M, Y') }}</span>
                @if(\App::getLocale() == 'es')
                    {!!  $post->content !!}
                @elseif(\App::getLocale() == 'en' && $post->content_en != null)
                    {!!  $post->content_en !!}
                @elseif(\App::getLocale() == 'cn' && $post->content_cn != null)
                    {!!  $post->content_cn !!}
                @else
                    {!!  $post->content !!}
                @endif
                <aside class="author-info">
                    <p>
                        <strong>{{ $post->user->name }}</strong><br />
                        BC2 - Coordinador editorial y analista
                    </p>
                </aside>
                {{--<div id="fb-root"></div>--}}
                {{--<script>(function(d, s, id) {--}}
                        {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
                        {{--if (d.getElementById(id)) return;--}}
                        {{--js = d.createElement(s); js.id = id;--}}
                        {{--js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";--}}
                        {{--fjs.parentNode.insertBefore(js, fjs);--}}
                    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
                {{--<div class="fb-share-button"--}}
                     {{--data-href="{{ url()->current() }}"--}}
                     {{--data-layout="button"--}}
                     {{--data-size="small"--}}
                     {{--data-mobile-iframe="true">--}}
                    {{--<a class="fb-xfbml-parse-ignore"--}}
                       {{--target="_blank"--}}
                       {{--id="share_fb"--}}
                       {{--href="">@lang('blog.comentario_s')</a></div>--}}
                <div class="clear" id="comments"></div>
                <div class="single-post-comments">
                    <div class="comments-area">
                        <div class="comments-heading">
                            <h3>{{ $post->comments()->count() }} @lang('blog.comentario_s')</h3>
                        </div>
                        <div class="comments-list">
                            <ul>
                                @foreach($post->comments()->get() as $comment)
                                    <li>
                                        <div class="comments-details">
                                            <div class="comments-list-img">
                                                <img src="/img/blog/b02.jpg" alt="post-author">
                                            </div>
                                            <div class="comments-content-wrap">
															<span>
																<b><a href="#">{{ $comment->name }}</a></b>
                                                                {{--Post author--}}
                                                                <span class="post-time">{{ date("F d, Y h:i:s A", strtotime($comment->created_at)) }} </span>
																<a class="page-scroll" href="#comment" onclick="Responder({{ $comment->id }})">Responder</a>
															</span>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @foreach(\App\Models\Comment::whereFatherCommentId($comment->id)->get() as $subcomment)
                                        <li class="threaded-comments">
                                            <div class="comments-details">
                                                <div class="comments-list-img">
                                                    <img src="/img/blog/b02.jpg" alt="post-author">
                                                </div>
                                                <div class="comments-content-wrap">
															<span>
																<b><a href="#">{{ $subcomment->name }}</a></b>
                                                                {{--Post author--}}
                                                                <span class="post-time">{{ date("F d, Y h:i:s A", strtotime($subcomment->created_at)) }} </span>
                                                                {{--<a href="#">Reply</a>--}}
															</span>
                                                    <p>{{ $subcomment->content }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div id="comment"></div>
                    <div class="comment-respond">
                        <h3 class="comment-reply-title">@lang('blog.dejanos')</h3>
                        <span class="email-notes">@lang('blog.nota') *</span>
                        {{ Form::open(['route' => 'comment.post']) }}
                        {{ Form::hidden('post_id', $post->id) }}
                        {{ Form::hidden('lang', \App::getLocale()) }}
                        {{ Form::hidden('father_comment_id', null, ['class' => 'form-control', 'id' => 'father_comment_id']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <p>@lang('blog.nombre') *</p>
                                <input type="text" name="name" placeholder="" required />
                            </div>
                            <div class="col-md-6">
                                <p>@lang('blog.correo') *</p>
                                <input type="email" name="email" required placeholder="" />
                            </div>
                            {{--<div class="col-md-12">--}}
                                {{--<p>@lang('blog.sitioweb')</p>--}}
                                {{--<input type="text" name="website" placeholder="" />--}}
                            {{--</div>--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                <p>@lang('blog.comentario'):</p>
                                <textarea id="message-box" name="content" required cols="30" rows="10" placeholder="@lang('blog.escribaaqui')"></textarea>
                                <input type="submit" value="@lang('blog.enviar')" />
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div><!-- single-blog end -->
            </article>
            <div class="bg-gray pad-20 article-sidebar">
                <ul class="container-recientes">
                    @foreach($posts as $post)
                    <li>
                        <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}" class="left pub-thumb">
                            <img src="{{ ($post->file != "") ? $post->file->path : "/img/blog/1.jpg" }}" alt="{{ $post->title }}" title="{{ $post->title }}" />
                        </a>
                        <div class="right">
                            <h1>
                                <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'category_name' => str_slug($post->category->name), 'post_id' => $post->id]) }}">
                                    @if(\App::getLocale() == 'es') {{ $post->title  }} @elseif(\App::getLocale() == 'en' && $post->title_en != '') {{  $post->title_en }} @elseif(\App::getLocale() == 'cn' && $post->title_cn != '') {{$post->title_cn}} @else {{$post->title }}@endif
                                </a>
                            </h1>
                            <p>
                                {{--{{ dd($post) }}--}}

                                @if(\App::getLocale() == 'es') {{ substr(trim(strip_tags($post->content)), 0, 150) }} @elseif(\App::getLocale() == 'en' && $post->content_en != null) {{ substr(strip_tags($post->content_en), 0, 180) }} @elseif(\App::getLocale() == 'cn' && $post->content_cn != null) {{ substr(trim(strip_tags($post->content_cn)), 0, 180) }} @else {{ substr(strip_tags($post->content), 0, 150) }}@endif
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
                    @endforeach

                </ul>
                {{--<a href="#" class="underline txt-center txt-gray btn-mas">Ver Más</a>--}}
            </div>
        </div>
    </section>
    <!-- /ARTICLE -->

@endsection
