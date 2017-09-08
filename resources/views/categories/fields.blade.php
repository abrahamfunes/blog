<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre de categoría:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancelar</a>
</div>
