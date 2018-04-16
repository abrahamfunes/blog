<div class="col-sm-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Español</a></li>
            <li><a href="#tab_2" data-toggle="tab">English</a></li>
            <li><a href="#tab_3" data-toggle="tab">中文</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <!-- Title Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'Titulo:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        {!! Form::hidden('title_slug', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Category Id Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('category_id', 'Categoría:') !!}
                        {!! Form::select('category_id', \App\Models\Category::whereStatusId(1)->where('id', '!=', 4)->pluck('name', 'id'), null, ['id' =>'category_id','placeholder' => '[ Seleccione ]', 'class' => 'form-control select2', 'required' => true]) !!}
                    </div>

                    <!-- Status Id Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('status_id', 'Estatus:') !!}
                        {!! Form::select('status_id', [1 => 'Activo', 2 => 'Inactivo'], isset($post) ? null:2, ['class' => 'form-control select2']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                {!! Form::label('title', 'URL imagen:') !!}
                                {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::label('archivo', 'Imagen:') !!}
                                {!! Form::file('archivo_imagen', ['class' => 'form-control filestyle2', 'accept' => '.jpg', "onchange" => "loadFile(event)"]) !!}
                                {{ Html::image(isset($post->file) ? $post->file->path : null, 'No ha seleccionado imagen', array('class' => 'thumb', "style" => "width: 100%", "id" => "imageid")) }}
                                @if(isset($post->file))
                                    <div role="alert">
                                        <u class="text-muted">Si selecciona una nueva imagen, la imagen cambiara al hacer clic en <b>“Guardar”</b></u>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Content Field -->
                    <div class="form-group col-sm-8 col-lg-8">
                        {!! Form::label('content', 'Contenido:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control description entry-content']) !!}
                    </div>


                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="row">
                    <!-- Title Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Content Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('content', 'Content:') !!}
                        {!! Form::textarea('content_en', null, ['class' => 'form-control descriptionen entry-content']) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <div class="row">
                    <!-- Title Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('title', '標題:') !!}
                        {!! Form::text('title_cn', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Content Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('content', '內容:') !!}
                        {!! Form::textarea('content_cn', null, ['class' => 'form-control descriptioncn entry-content']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Regresar</a>
</div>
