@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Noticias</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('news.create') !!}">Agregar Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('news.table')
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <link href="plugins/datatables_new/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/datatables_new/media/js/dataTables.bootstrap.js"></script>


    <script>
        $.fn.dataTable.ext.errMode = 'throw';

        function format1(n, currency) {
            return currency + " " + parseFloat(n).toFixed(2).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                    });
        }
        $(function () {
            var table = $('#posts-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('api.news.index') }}",
                    "type": "POST",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columnDefs": [
                    {
                        "targets": -1,
                        "orderable": false,
                        "width" : "70px",
                        "data": null,
                        "searchable": false,
                        "render": function (data, type, row, meta) {
                            return '{!! Form::open(['route' => ['news.destroy', null], 'method' => 'delete']) !!}<div class="btn-group"><a class="btn btn-default btn-xs" href="/news/'+ row.post_id+'/edit" data-toggle="tooltip" title="Editar Noticia"><i class="glyphicon glyphicon-edit"></i></a><button type="submit" class="btn btn-danger btn-xs delete" data-toggle="tooltip" title="Eliminar Noticia"><i class="glyphicon glyphicon-trash"></i></button></div>{!! Form::close() !!}';
                        }
                    },{
                        "targets" : 0,
                        "width" : "70px"
                    },{
                        "targets" : -2,
                        "render": function (data, type, row, meta) {
                            return (row.status_id == 1) ?  '<span class="label bg-green">Activo</span>' :  '<span class="label bg-red">Inactivo</span>'
                        }
                    },{
                        "targets": 1,
                        "render": function (data, type, row, meta) {
                            return  '<a href="es/blog/'+row.post_id+'" target="_blank" data-toggle="tooltip" title="Ver Post">'+row.title+'</a>';
                        }
                    }
                ],
                "pageLength": 25,
                "lengthMenu": [
                    [25, 50, 100],
                    [25, 50, 100] // change per page values here
                ],
                "sDom": '<"pull-left"f><"pull-right"l>rt<"pull-left"i><"pull-right"p><"clear">',
                "columns": [
                    {data: 'post_id'},
                    {data: 'title'},
                    {data: 'authorname'},
                    {data: 'updated_at'},
                    //{data: 'typename'},
                    {data: 'status_id'},
                    {data: null},
                ],
                "order": [[0, "desc"]],
                "language": {
                    "sProcessing": "Procesando...",
                    "searchPlaceholder": "Filtro de Búsqueda rápida",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
//            $('#posts-table tbody').on('click', '.edit', function () {
//                var data = table.row($(this).parents('tr')).data();
//                //alert( data.id );
//                window.location = '/articles/' + data.id + '/edit';
//            });
            $('#posts-table tbody').on('click', '.delete', function (event) {
                event.preventDefault();
                var data = table.row($(this).parents('tr')).data();
                var e = $(this).parents('form');
                var url = e[0].action + "/" + data.post_id;
                e[0].action = url;

                swal({
                    title: "Eliminar registro?",
                    text: "Desea eliminar el registro: "+data.title+"?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Quitalo!",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm){
                    $('div.dataTables_filter input')[0].focus();
                    $('[data-toggle="tooltip"]').tooltip();
                    if(isConfirm) {
                        e.submit();
                    } else {
                        return false;
                    }
                });
                return false;
            });
            $('div.dataTables_filter input').css("width", "230px");
        });


        showError = function (sMessage) {
            swal({
                title: sMessage,
                type: "warning",
                confirmButtonText: "Aceptar",
                closeOnConfirm: true,
                closeOnCancel: false
            });
        };

        function Eliminar(name){
            swal({
                    title: "Eliminar registro?",
                    text: "Desea eliminar el registro: "+name+"?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Quitalo!",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm){
                    if (isConfirm) {
                        return true;
                    } else {
                        return false;
                    }
//                    if (isConfirm) {
//                        var data = table.row(obj.parents('tr')).data();
//                        alert(data.post_id);
//                        var e = $(obj).parents('form');
//                        alert(e.method);
//                        var form = e.parent('form').get(0);
//                        var url = e[0].action + "/" + id;
//                        e[0].action = url;
//                    }
                });
        }
    </script>
@stop
