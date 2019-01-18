@extends('layouts.layout')

@section('metas')
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="bc2.mx" />
    <meta property="og:title"         content="bc2.mx" />
    <meta property="og:description"   content="{{ $post->title }}" />
    <meta property="og:image"         content="https://bc2.mx{{ ($post->file) ? $post->file->path : "" }}" />
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

@section('banner')
    <script type="text/javascript">
        var dir = window.document.URL;
        var dir2 = encodeURIComponent(dir);
        var tit = window.document.title;
        var tit2 = encodeURIComponent(tit);
    </script>
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
                            <h2 class="title3">@lang('blog.menu_noticias') / @lang('blog.blog')</h2>
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

                <!-- End left sidebar -->
                <!-- Start single blog -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- single-blog start -->
                            <article class="blog-post-wrapper">
                                <div class="post-thumbnail">
                                    <img src="{{ ($post->file) ? $post->file->path : "" }}" alt="" style="max-height: 530px; height: auto; width: 100%" />
                                    @if($post->image_url != "") <span style="font-size: 9px">@lang('blog.imagen_tomada') {{ $post->image_url }}</span> @endif
                                </div>
                                <div class="post-information">
                                    <h2>
                                        @if(\App::getLocale() == 'es' && $post->title != '')
                                            {!!  $post->title !!}
                                        @elseif(\App::getLocale() == 'en' && $post->title_en != '')
                                            {!!  $post->title_en !!}
                                        @elseif(\App::getLocale() == 'cn' && $post->title_cn != '')
                                            {!!  $post->title_cn !!}
                                        @else
                                            {!!  $post->title !!}
                                        @endif
                                    </h2>
                                    <div class="entry-meta">
                                        <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{!! $post->user->name !!}</a></span>
                                        <span><i class="fa fa-clock-o"></i> {{ date("F d, Y", strtotime($post->created_at)) }}</span>
											<span class="tag-meta">
												<i class="fa fa-folder-o"></i>
												<a href="#">@if(\App::getLocale() == 'en') {!! $post->category->name_en !!} @elseif(\App::getLocale() == 'cn') {!! $post->category->name_cn !!} @else {!! $post->category->name !!} @endif</a>
											</span>
											{{--<span>--}}
												{{--<i class="fa fa-tags"></i>--}}
												{{--<a href="#">tools</a>,--}}
												{{--<a href="#"> Humer</a>,--}}
												{{--<a href="#">House</a>--}}
											{{--</span>--}}
                                        <span><i class="fa fa-comments-o"></i> <a href="#">{{ $post->comments()->count() }} @lang('blog.comentario_s')</a></span>
                                    </div>
                                    <div class="entry-content" style="text-align: justify !important">
                                        @if(\App::getLocale() == 'es')
                                            {!!  $post->content !!}
                                        @elseif(\App::getLocale() == 'en')
                                            {!!  $post->content_en !!}
                                        @elseif(\App::getLocale() == 'cn')
                                            {!!  $post->content_cn !!}
                                        @endif
                                        {{--<p>Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>--}}
                                        {{--<blockquote>--}}
                                            {{--<p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>--}}
                                        {{--</blockquote>--}}
                                        {{--<p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>--}}
                                    </div>
                                    @lang('blog.compartir')<br>
                                    {{--<a href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);var dir2= encodeURIComponent(dir);window.location.href=('http://www.facebook.com/share.php?u='+dir2+'&amp;t='+tit2+'');" target="_blank"><img src="/img/face.png" border="0" width="128" height="52" alt="Compartir" /></a>--}}
                                    {{--<a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"><img src="/img/face.png" border="0" width="128" height="52" alt="Compartir" /></a>--}}
                                    {{--<a href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);window.location.href=('http://twitter.com/?status='+tit2+'%20'+dir+'');" target="_blank"><img src="/img/share-twitter.png" border="0" width="128" height="52" alt="Compartir" /></a>--}}
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                                    <div class="fb-share-button"
                                         data-href="{{ url()->current() }}"
                                         data-layout="button"
                                         data-size="small"
                                         data-mobile-iframe="true">
                                        <a class="fb-xfbml-parse-ignore"
                                           target="_blank"
                                           id="share_fb"
                                           href="">@lang('blog.comentario_s')</a></div><br>
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    {{--<a id="share_twitter" href="" target="_blank"><img src="/img/share-twitter.png" border="0" width="128" height="52" alt="Compartir" /></a>--}}
                                </div>
                            </article>
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
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>@lang('blog.nombre') *</p>
                                                <input type="text" name="name" placeholder="" required />
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>@lang('blog.correo') *</p>
                                                <input type="email" name="email" required placeholder="" />
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>@lang('blog.sitioweb')</p>
                                                <input type="text" name="website" placeholder="" />
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                                <p>@lang('blog.comentario'):</p>
                                                <textarea id="message-box" name="content" required cols="30" rows="10" placeholder="@lang('blog.escribaaqui')"></textarea>
                                                <input type="submit" value="@lang('blog.enviar')" />
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div><!-- single-blog end -->
                        </div>
                        <!-- End single blog -->

                        <!-- Start single blog -->


                        {{--<div class="blog-pagination">--}}
                            {{--<ul class="pagination">--}}
                                {{--<li><a href="/#">&lt;</a></li>--}}
                                {{--<li class="active"><a href="/#">1</a></li>--}}
                                {{--<li><a href="/#">2</a></li>--}}
                                {{--<li><a href="/#">3</a></li>--}}
                                {{--<li><a href="/#">&gt;</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    @include('layouts.layout-sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection