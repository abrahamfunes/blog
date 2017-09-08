<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Titulo:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('title_slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('category_id', 'Categoría:') !!}
    {!! Form::select('category_id', \App\Models\Category::whereStatusId(1)->pluck('name', 'id'), null, ['id' =>'category_id','placeholder' => '[ Seleccione ]', 'class' => 'form-control select2', 'required' => true]) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status_id', 'Estatus:') !!}
    {!! Form::select('status_id', [1 => 'Activo', 2 => 'Inactivo'], isset($post) ? null:2, ['class' => 'form-control select2']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('archivo', 'Imagen:') !!}
    {!! Form::file('archivo_imagen', ['class' => 'form-control filestyle2', 'accept' => '.jpg', "onchange" => "loadFile(event)"]) !!}
    {{ Html::image(isset($post->file) ? $post->file->path : null, 'No ha seleccionado imagen', array('class' => 'thumb', "style" => "width: 100%", "id" => "imageid")) }}
    @if(isset($post->file))
        <div role="alert">
            <u class="text-muted">Si selecciona una nueva imagen, la imagen cambiara al hacer clic en <b>“Guardar”</b></u>
        </div>
    @endif
</div>

<!-- Content Field -->
<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('content', 'Contenido:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control description entry-content']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Regresar</a>
</div>
