@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Usuarios del sistema</h1>

        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Agregar Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<link href="plugins/datatables_new/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="plugins/datatables_new/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatables_new/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="plugins/datatables_new/media/js/dataTables.bootstrap.js"></script>

<script>
$(document).ready(function() {
	$('.datatable').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"buttons": true,
		"searchHighlight": true,
		"lengthMenu": [
			[25, 35, 50, -1],
			[25, 35, 50, "Todos"] // change per page values here
		],
		"columnDefs": [
			{
				"targets": -1,
				"orderable": false,
				"width" : "70px",
				"searchable": false
			}
		],
		"pageLength": 25,
		"sDom": '<"pull-left"f><"pull-right"l>rt<"bottom"ip><"clear">',
		"language": {
			"sSearch": "Buscar:",
			"searchPlaceholder" : "Filtro de Búsqueda rápida",
			"lengthMenu": "_MENU_ registros por pagina",
			"zeroRecords": "Ningun registro encontrado...",
			"info": "Registro _START_ al _END_, de _TOTAL_ registros", //de _MAX_ registros
			"infoEmpty": "Sin registros encontrados ",
			"infoFiltered": "(filtrado de _MAX_ registros)",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			}
		}
	});
	$('div.dataTables_filter input').css("width","230px");
	$('div.alert').not('.alert-important').delay(3000).fadeOut(600);
});
</script>
@stop