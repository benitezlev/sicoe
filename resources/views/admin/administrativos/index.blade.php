@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado del personal administrativo</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Personal registrado</h3>

                    <div class="card-tools">
                        <a href="{{url('/admin/administrativos/create')}}" class="btn btn-primary"> Crear nuevo</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="administrativos" class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="text-align: center">Número</th>
                            <th style="text-align: center">Nombre</th>
                            <th style="text-align: center">Rol</th>
                            <th style="text-align: center">Clave de servidor público</th>
                            <th style="text-align: center">Correo</th>
                            <th style="text-align: center">Teléfono</th>

                            <th style="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $contador = 1;
                        @endphp
                        @foreach($administrativos as $administrativo)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$administrativo->nombre}}</td>
                                <td style="text-align: center">{{$administrativo->usuario->roles->pluck('name')->implode(', ')}}</td>
                                <td style="text-align: center">{{$administrativo->cve_servidor}}</td>
                                <td style="text-align: center">{{$administrativo->usuario->email}}</td>
                                <td style="text-align: center">{{$administrativo->telefono}}</td>

                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('/admin/administrativos/'.$administrativo->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/administrativos/'.$administrativo->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/administrativos',$administrativo->id)}}" method="post"
                                              onclick="preguntar{{$administrativo->id}}(event)" id="miFormulario{{$administrativo->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$administrativo->id}}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar esta registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$administrativo->id}}');
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #administrativos_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px; /* Espaciado entre botones */
            margin-bottom: 15px; /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #administrativos_wrapper .btn {
            color: #fff; /* Color del texto en blanco */
            border-radius: 4px; /* Bordes redondeados */
            padding: 5px 15px; /* Espaciado interno */
            font-size: 14px; /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; }
        .btn-info { background-color: #17a2b8; border: none; }
        .btn-warning { background-color: #ffc107; color: #212529; border: none; }
        .btn-default { background-color: #6e7176; color: #212529; border: none; }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $("#administrativos").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Administrativos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Administrativos",
                    "infoFiltered": "(Filtrado de _MAX_ total Administrativos)",
                    "lengthMenu": "Mostrar _MENU_ Administrativos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    { text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default' },
                    { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger' },
                    { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info' },
                    { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success' },
                    { text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning' }
                ]
            }).buttons().container().appendTo('#administrativos_wrapper .row:eq(0)');
        });
    </script>
@stop
