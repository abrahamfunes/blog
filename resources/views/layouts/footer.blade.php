<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-img">
                                <a href="/#">
                                    <img src="/img/logo/logo2.png" alt="">
                                </a>
                            </div>
                            <p style="text-align: justify">@lang('blog.footer_bc2')</p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="/#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="/#">--}}
                                            {{--<i class="fa fa-google"></i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="/#">--}}
                                            {{--<i class="fa fa-pinterest"></i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>@lang('blog.mas_informacion')</h4>
                            <p>
                                @lang('blog.footer_masinfo')
                            </p>
                            <div class="footer-contacts">
                                <p><span>@lang('blog.telefono'):</span> +52 (662) 301-31-45</p>
                                <p><span>@lang('blog.correo'):</span> info@bc2.mx</p>
                                <p><span>@lang('blog.horario'):</span> 9AM - 5PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>@lang('blog.noticias_recientes')</h4>
                            <div class="flicker-img">
                                @foreach($recents as $post)
                                    <a href="{{ route('blog.getPost', ['lang' => \App::getLocale(), 'post_id' => $post->id]) }}" style="min-height: 96px; max-height: 96px ; min-width: 118px;">
                                        <img src="{{ ($post->file != null && $post->file->path != "") ? $post->file->path : '/img/portfolio/1.jpg' }}" alt="" style="max-height: 95px;">
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            Copyright © 2017
                            <a href="/"> bc2.mx</a>.
                            @lang('blog.derechos')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>