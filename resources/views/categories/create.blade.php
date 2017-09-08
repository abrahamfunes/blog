@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categorías
        </h1>
        <h5>Nuevo registro</h5>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'categories.store']) !!}

                        @include('categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
