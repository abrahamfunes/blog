<table class="table table-responsive datatable table-bordered table-striped table-hover" id="categories-table">
    <thead>
        <th>Nombre</th>
        <th>Acción</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->name !!}</td>
            <td>
                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs' data-toggle="tooltip" title="Editar registro"><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',  "data-toggle"=>"tooltip", "title"=>"Eliminar registro", 'onclick' => "return confirm('Desea eliminar el registro con nombre: $category->name ?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>