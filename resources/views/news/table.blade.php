<table class="table table-responsive datatable table-bordered table-striped table-hover" id="posts-table">
    <thead>
        <th>Folio</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Actualizado Al</th>
        <th>Estatus</th>
        <th>Acción</th>
    </thead>
    {{--<tbody>--}}
    {{--@foreach($posts as $post)--}}
        {{--<tr>--}}
            {{--<td>{!! $post->id !!}</td>--}}
            {{--<td><a href="{{ route('blog.getPost', $post->title_slug) }}" target="_blank">{!! $post->title !!}</a></td>--}}
            {{--<td>{!! $post->user->name !!}</td>--}}
            {{--<td>{!! $post->category->name !!}</td>--}}
            {{--<td>{!! $post->thumbnail_id !!}</td>--}}
            {{--<td>{!! ($post->status_id == 1) ?  '<span class="label bg-green">Activo</span>' :  '<span class="label bg-red">Inactivo</span>' !!}</td>--}}
            {{--<td>--}}
                {{--{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs' data-toggle="tooltip" title="Editar Post"><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', "data-toggle" => "tooltip", "title" => "Eliminar Post", 'onclick' => "return confirm('Desea eliminar el registro con Titulo: $post->title ?')"]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
</table>