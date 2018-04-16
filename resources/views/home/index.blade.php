@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Indicadores
            <small>Estadistica General</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Indicadores</a></li>
            <li><a href="#">Vista General</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! $data['posts_es'] !!}</h3>
                        <p>Publicaciones (Español)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">&nbsp;
                        {{--Ir al reporte <i class="fa fa-arrow-circle-right"></i>--}}
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! $data['posts_en'] !!}</h3>
                        <p>Publicaciones (English)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">&nbsp;
                        {{--Ir al reporte <i class="fa fa-arrow-circle-right"></i>--}}
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! $data['posts_cn'] !!}</h3>
                        <p>Publicaciones (中文)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">&nbsp;
                        {{--Ir al reporte <i class="fa fa-arrow-circle-right"></i>--}}
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{!! $data['postsinactivos'] !!}</h3>
                        <p>Post Inactivos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-code-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        &nbsp;
                    </a>
                </div>
            </div><!-- ./col -->
            {{--<div class="col-md-4 col-sm-6 col-xs-12">--}}
                {{--<div class="small-box bg-primary">--}}
                    {{--<div class="inner">--}}
                        {{--<h3>{!! $data['categorias'] !!}</h3>--}}
                        {{--<p>Categorias</p>--}}
                    {{--</div>--}}
                    {{--<div class="icon">--}}
                        {{--<i class="fa fa-list"></i>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="small-box-footer">--}}
                        {{--&nbsp;--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div><!-- /.row -->
    </section>
@endsection
