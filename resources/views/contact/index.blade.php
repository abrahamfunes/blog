@extends('layouts.layout')

@section('banner')
        <!-- Start Bottom Header -->
<div class="header-bg page-area" style="background: url(/img/banner_contact.jpg) !important;background-repeat: no-repeat;
    background-size: cover;
    background-position: top center;
    background-attachment: fixed;">
    <div class="home-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                            <h1 class="title2">@lang('blog.escribenos')</h1>
                        </div>
                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                            {{--<h2 class="title3">Noticias / Blog</h2>--}}
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
        <!-- Start contact Area -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>@lang('blog.contacto')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-mobile"></i>
                            <p>
                                Tel : +52 (662) 301-31-45<br>
                                <span>Lunes a viernes (9am - 5pm)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-envelope-o"></i>
                            <p>
                                Correo : info@bc2.mx<br>
                                <span>Web: www.bc2.mx</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Location : Hermosillo, Sonora, México.<br>
                                <span>Blvd Kino 415, Col. Contry club</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Right Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <div class="map-area">
                        <div id="googleMap" style="width:100%;height:310px;"></div>
                    </div>
                    <!-- End Map -->
                </div>
                <!-- End Right Google Map -->
                <!-- Start Left contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <div class="row">
                            {{ Form::open(['route' => 'contact.post']) }}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" class="email form-control" id="email" name="email" placeholder="Correo" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="msg_subject" class="form-control" name="title" placeholder="Titulo" required data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" name="subject" rows="7" placeholder="Mensaje" class="form-control" required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" id="submit" class="add-btn contact-btn">Enviar</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcmvoOYR7cM53ANLGqQbKYgW555p9iPPw&callback=initialize"></script>
    <script type="text/javascript" src="/js/mapcode.js"></script>
@stop