@extends('layouts.layout2')

<?php

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

?>

@section('header')
    <section class="block container bg-dark txt-white intro contacto">
        @include('layouts.layout2-menu')
        <div class="txt-center container-contact">
            <h1>@lang('blog.escribenos')</h1>
            {{ Form::open(['route' => 'contact.post', 'class' => 'form contact-form']) }}
            {{ Form::hidden('lang', \App::getLocale()) }}
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="@lang('blog.form_nombre')" />
            </div>
                <input type="email" name="email" placeholder="@lang('blog.form_correo')" />
                <input type="text" name="title" placeholder="@lang('blog.form_titulo')" />
                <textarea name="subject" placeholder="@lang('blog.form_mensaje')"></textarea>
                <input type="submit" value="@lang('blog.btn_enviar')" />
            {{ Form::close() }}
        </div>
        <div class="clear"></div>
    </section>
@endsection


@section('content')

    <!-- CONTACT BOTTOM -->
    <section class="container bg-white pad-20 txt-gray txt-center contact-btm">
        <div class="max-w">
            <p class="mas-info">
                @lang('blog.footer_masinfo')
            </p>
            <ul class="list list-contact">
                <li>
                    <img src="/images/icon-tel.png" alt="Teléfono" title="Teléfono" />
                    <p>
                        +52 (662) 301-31-45<br />
                        Lunes a viernes (9am - 5pm)
                    </p>
                </li>
                <li>
                    <img src="/images/icon-email.png" alt="Email" title="Email" />
                    <p>
                        Correo : <a href="mailto:info@bc2.mx">info@bc2.mx</a><br />
                        Web: <a href="http://www.bc2.mx">www.bc2.mx</a>
                    </p>
                </li>
                <li>
                    <img src="/images/icon-ubicacion.png" alt="Ubicación" title="Ubicación" />
                    <p>
                        Hermosillo, Sonora, México<br />
                        Blvd Kino 415, Col. Contry club
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <!-- /CONTACT BOTTOM -->
@endsection
