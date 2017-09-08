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
                            <p>Redug Lagre dolor sit amet, consectetur adipisicing elit. Minima in nostrum, veniam. Esse est assumenda inventore, facere adipisci tenetur.</p>
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
                            <h4>Mas información</h4>
                            <p>
                                You can contact us our consectetur adipisicing elit.inventore, facere adipisci tenetur.
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> +52 (662) 301-31-45</p>
                                <p><span>Correo:</span> info@bc2.mx</p>
                                <p><span>Horario:</span> 9AM - 5PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Publicaciones recientes</h4>
                            <div class="flicker-img">
                                @foreach($recents as $post)
                                    <a href="{{ route('blog.getPost', $post->title_slug) }}" style="min-height: 96px; max-height: 96px ; min-width: 118px;">
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
                            Todos los derechos reservados
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>