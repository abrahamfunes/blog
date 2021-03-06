<div class="page-head-blog">
    <div class="single-blog-page">
        <!-- search option start -->
        <form action="#">
            <div class="search-option">
                <input type="text" placeholder="@lang('blog.buscar')...">
                <button class="button" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        <!-- search option end -->
    </div>
    <div class="single-blog-page">
        <!-- recent start -->
        <div class="left-blog">
            <h4>@lang('blog.noticias_recientes')</h4>
            <div class="recent-post">
                @foreach($recents as $post)
                        <!-- start single post -->
                <?php
                if(\App::getLocale() == 'en' && $post->title_en != ''){
                    $post->title = $post->title_en;
                }elseif(\App::getLocale() == 'cn' && $post->title_cn != ''){
                    $post->title = $post->title_cn;
                }
                ?>
                <div class="recent-single-post">
                    <div class="post-img">
                        <a href="/#">
                            <img src="{{ ($post->file != null) ? $post->file->path : '/img/blog/2.jpg' }}" alt="" style="max-height: 68px">
                        </a>
                    </div>
                    <div class="pst-content">
                        <p><a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'post_id' => $post->id]) }}"> {{ $post->title }}.</a></p>
                    </div>
                </div>
                <!-- End single post -->
                @endforeach
            </div>
        </div>
        <!-- recent end -->
    </div>
    {{--<div class="single-blog-page">--}}
        {{--<div class="left-blog">--}}
            {{--<h4>Categorias</h4>--}}
            {{--<ul>--}}
                {{--@foreach($categories as $category)--}}
                    {{--<li>--}}
                        {{--<a href="{{ Request::url() }}?cat={{ $category->id }}">{{ $category->name }}</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>