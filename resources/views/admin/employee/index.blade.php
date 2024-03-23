@extends('layouts.app')
@section('title' )
    EMPLEADOS
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection
@section('content')
    <div class="card p-3">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>EMPLEADOS</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableEmployees" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableEmployees').DataTable({
                ajax: route('employees'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'nombre', orderable: false, className: 'text-capitalize'},
                    {data: 'direccion', orderable: false},
                    {data: 'telefono', orderable: false},
                    {data: 'cargo', orderable: false},
                    {data: 'salario'},
                    {data: 'correo', orderable: false},
                    {data: 'btns'}
                ],
                bLengthChange: false,
                info: false,
                pageLength: 100,
                processing: false,
                serverSide: true,
                language: {
                    decimal: "",
                    emptyTable: "No hay información",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
                    infoFiltered: "(Filtrado de _MAX_ total entradas)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ Entradas",
                    loadingRecords: "Cargando lista de empleados...",
                    processing: "Procesando...",
                    search: "Buscar:",
                    zeroRecords: "Sin resultados encontrados",
                    paginate: {
                        first: "Primero",
                        last: "Ultimo",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                },
                order: [[0, "desc"]]
            });
            dataTabla.columns([0]).visible(false);
        });
        const app = {
            btnEdit: function (id) {
                alert('Editar empleado con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar empleado con id: ' + id);
            }
        };
    </script>
@endsection
