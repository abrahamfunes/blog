@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Noticias
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'news.store', 'files' => true]) !!}

                        @include('news.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('imageid');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection