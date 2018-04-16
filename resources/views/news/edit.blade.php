@extends('layouts.app')

@section('css')
    <style>
        blockquote {
            background: #fff none repeat scroll 0 0;
            border-left: 5px solid #3EC1D5;
            font-size: 17.5px;
            font-style: italic;
            margin: 0 0 20px 40px;
            padding: 22px 20px;
        }
    </style>
@endsection

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
                   {!! Form::model($post, ['route' => ['news.update', $post->id], 'method' => 'patch', 'files' => true]) !!}

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