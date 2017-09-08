@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Usuarios del sistema</h1>
        <h5>Editar registro</h5>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'autocomplete' => "off"]) !!}

                        @include('users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection