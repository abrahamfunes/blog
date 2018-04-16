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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Header -->
@endsection

@section('content')
                    <div id="about" class="about-area area-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-headline text-center">
                                        <h2>@lang('blog.menu_nosotros')</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- single-well start-->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="well-left">
                                        <div class="single-well">
                                            <a href="#">
                                                <img src="/img/about/1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-well end-->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="well-middle">
                                        <div class="single-well">
                                            <a href="#">
                                                <h4 class="sec-head">Bc2.mx <!--(Actualidad legal y evolución empresarial)--></h4>
                                            </a>
                                            <p>
                                                @lang('blog.footer_bc2')
                                            </p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-check"></i>
                                                    @lang('blog.submenu_leg')
                                                </li>
                                                <li>
                                                    <i class="fa fa-check"></i>
                                                    @lang('blog.submenu_fin')
                                                </li>
                                                <li>
                                                    <i class="fa fa-check"></i>
                                                    @lang('blog.submenu_cor')
                                                </li>
                                                <li>
                                                    <i class="fa fa-check"></i>
                                                    @lang('blog.submenu_eco')
                                                </li>
                                                <li>
                                                    <i class="fa fa-check"></i>
                                                    @lang('blog.submenu_fis')
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End col-->
                            </div>
                        </div>
                    </div>

                    <div id="team" class="our-team-area area-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-headline text-center">
                                        <h2>@lang('blog.nuestros_editores')</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="team-top">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="single-team-member">
                                            <div class="team-img">
                                                <a href="#">
                                                    <img src="/img/team/1.jpg" alt="">
                                                </a>
                                                <div class="team-social-icon text-center">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h4>Jhon Mickel</h4>
                                                <p>Editor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End column -->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="single-team-member">
                                            <div class="team-img">
                                                <a href="#">
                                                    <img src="/img/team/2.jpg" alt="">
                                                </a>
                                                <div class="team-social-icon text-center">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h4>Andrew Arnold</h4>
                                                <p>Editor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End column -->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="single-team-member">
                                            <div class="team-img">
                                                <a href="#">
                                                    <img src="/img/team/3.jpg" alt="">
                                                </a>
                                                <div class="team-social-icon text-center">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h4>Lellien Linda</h4>
                                                <p>Editor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End column -->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="single-team-member">
                                            <div class="team-img">
                                                <a href="#">
                                                    <img src="/img/team/4.jpg" alt="">
                                                </a>
                                                <div class="team-social-icon text-center">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="team-content text-center">
                                                <h4>Jhon Powel</h4>
                                                <p>Editor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End column -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
