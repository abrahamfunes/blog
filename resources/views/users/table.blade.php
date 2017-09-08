<table class="table table-responsive datatable table-bordered table-striped table-hover" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Perfil</th>
        <th>Modificado</th>
        <th>Estatus</th>
        <th>Acción</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->profile()['description'] !!}</td>
            <td>{!! $user->updated_at !!}</td>
            <td>{!! ($user->status_id == 1) ?  '<span class="label bg-green">Activo</span>' :  '<span class="label bg-red">Inactivo</span>' !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!--<a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Desea eliminar el usuario: $user->name ?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>