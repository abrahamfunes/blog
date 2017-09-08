@extends('layouts.layout')

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
                            <h2 class="title3">Noticias / Blog</h2>
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    @include('layouts.layout-sidebar')
                </div>
                <!-- End left sidebar -->
                <!-- Start single blog -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- single-blog start -->
                            <article class="blog-post-wrapper">
                                <div class="post-thumbnail">
                                    <img src="{{ $post->file->path }}" alt="" style="max-height: 530px" />
                                </div>
                                <div class="post-information">
                                    <h2>{{ $post->title }}</h2>
                                    <div class="entry-meta">
                                        <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{!! $post->user->name !!}</a></span>
                                        <span><i class="fa fa-clock-o"></i> {{ date("F d, Y", strtotime($post->created_at)) }}</span>
											<span class="tag-meta">
												<i class="fa fa-folder-o"></i>
												<a href="#">{!! $post->category->name !!}</a>
											</span>
											{{--<span>--}}
												{{--<i class="fa fa-tags"></i>--}}
												{{--<a href="#">tools</a>,--}}
												{{--<a href="#"> Humer</a>,--}}
												{{--<a href="#">House</a>--}}
											{{--</span>--}}
                                        <span><i class="fa fa-comments-o"></i> <a href="#">{{ $post->comments()->count() }} comentario(s)</a></span>
                                    </div>
                                    <div class="entry-content">
                                        {!!  $post->content !!}
                                        {{--<p>Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut lectus fermentum eleifend. Pellentesque faucibus sem ante, non malesuada odio varius nec. Suspendisse potenti. Proin consectetur aliquam odio nec fringilla. Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales. Fusce ornare sit amet ligula condimentum sagittis.</p>--}}
                                        {{--<blockquote>--}}
                                            {{--<p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>--}}
                                        {{--</blockquote>--}}
                                        {{--<p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>--}}
                                    </div>
                                </div>
                            </article>
                            <div class="clear" id="comments"></div>
                            <div class="single-post-comments">
                                <div class="comments-area">
                                    <div class="comments-heading">
                                        <h3>{{ $post->comments()->count() }} comentario(s)</h3>
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
                                    <h3 class="comment-reply-title">Déjanos un comentario</h3>
                                    <span class="email-notes">Su dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *</span>
                                    {{ Form::open(['route' => 'comment.post']) }}
                                    {{ Form::hidden('post_id', $post->id) }}
                                    {{ Form::hidden('father_comment_id', null, ['class' => 'form-control', 'id' => 'father_comment_id']) }}
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>Nombre *</p>
                                                <input type="text" name="name" placeholder="Su nombre" required />
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>Correo *</p>
                                                <input type="email" name="email" required placeholder="Ej. correo@dominio.com" />
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <p>Sitio Web</p>
                                                <input type="text" name="website" placeholder="Ej. mipagina.com" />
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                                <p>Comentario:</p>
                                                <textarea id="message-box" name="content" required cols="30" rows="10" placeholder="Escriba aquí su mensaje"></textarea>
                                                <input type="submit" value="Enviar comentario" />
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Responder = function (id){
            $("#father_comment_id").val(id);
        }
    </script>
    @endsection