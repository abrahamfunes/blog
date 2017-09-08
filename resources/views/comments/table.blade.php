<table class="table table-responsive datatable table-bordered table-striped table-hover" id="comments-table">
    <thead>
        <th>Post Folio</th>
        <th>Contenido</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acción</th>
    </thead>
    {{--<tbody>--}}
    {{--@foreach($comments as $comment)--}}
        {{--<tr>--}}
            {{--<td>{!! $comment->post_id !!}</td>--}}
            {{--<td>{!! $comment->content !!}</td>--}}
            {{--<td>{!! $comment->name !!}</td>--}}
            {{--<td>{!! $comment->email !!}</td>--}}
            {{--<td>--}}
                {{--{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
</table>