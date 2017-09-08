@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuarios del sistema
        </h1>
        <h5>Nuevo registro</h5>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store', 'autocomplete' => "off"]) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
