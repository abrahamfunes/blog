<!-- Name Field -->
<div class="form-group col-sm-5">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-5">
    {!! Form::label('email', 'Correo:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', " placeholder" => "Correo electrónico", 'autocomplete' => "off"]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-2">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Contraseña de usuario']) !!}
</div>

<!-- Profile Id Field -->
<div class="form-group col-sm-5">
    {!! Form::label('profile_id', 'Perfil:') !!}
    {!! Form::select('profile_id', (!\Auth::user()->hasAnyRole(['admin.general'])) ? \App\Models\Role::whereEnabled(true)->whereTrash(false)->where('id','>=', 2)->pluck('description', 'id') : \App\Models\Role::whereEnabled(true)->whereTrash(false)->pluck('description', 'id'), isset($user) ? $user->roles()->pluck('id') : null, ['class' => 'form-control select2', 'placeholder' => '[ Seleccione ]']) !!}
</div>


<div class="form-group col-sm-2">
    {!! Form::label('status_id', 'Estatus:') !!}
    {!! Form::select('status_id', [1 => 'Activo', 2 => 'Inactivo'], null, ['class' => 'form-control select2', 'placeholder' => '[ Seleccione ]']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Regresar</a>
</div>
