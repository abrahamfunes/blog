@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categorías
        </h1>
        <h5>Editar registro</h5>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}

                        @include('categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection