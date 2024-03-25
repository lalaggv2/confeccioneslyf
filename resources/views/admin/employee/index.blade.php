@extends('layouts.app')
@section('title' )
    EMPLEADOS
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection
@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>EMPLEADOS</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add"><i class="fa fa-plus"></i> Agregar empleado</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableEmployees" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>EPS</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="showEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title text-uppercase"></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm mb-4">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Nombre:</b> <label class="text-capitalize" id="name"></label></li>
                            <li class="list-group-item"><b>Tipo documento:</b> <label id="document_type"></label></li>
                            <li class="list-group-item"><b>Documento:</b> <label id="document"></label></li>
                            <li class="list-group-item"><b>Teléfono:</b> <label id="phone"></label></li>
                            <li class="list-group-item"><b>Dirección:</b> <label id="address"></label></li>
                            <li class="list-group-item"><b>Correo:</b> <label id="email"></label></li>
                            <li class="list-group-item"><b>Genero:</b> <label id="gender"></label></li>
                            <li class="list-group-item"><b>RH:</b> <span class="badge text-bg-info pt-2" id="rh"></span></li>
                            <li class="list-group-item"><b>EPS:</b> <label id="eps"></label></li>
                            <li class="list-group-item"><b>Cargo:</b> <span class="badge text-bg-primary pt-2"
                                                                     id="position"></span></li>
                            <li class="list-group-item"><b>Salario:</b> <label id="salary"></label></li>
                            <li class="list-group-item"><b>Fecha de ingreso a la empresa:</b> <label id="start_date"></label>
                            </li>
                            <li class="list-group-item d-none" id="contentContacts">
                                <h5 class="mb-0">CONTACTOS</h5>
                                <div id="contacts">

                                </div>
                            </li>
                            <li class="list-group-item">Estado: <label id="status"></label></li>
                        </ul>
                    </div>
                </div>
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
                    {data: 'name', orderable: false},
                    {data: 'document', orderable: false},
                    {data: 'phone', orderable: false},
                    {data: 'eps', orderable: false},
                    {data: 'position', orderable: false},
                    {data: 'salary', orderable: false},
                    {data: 'status', orderable: false, class: 'text-center'},
                    {data: 'btns', orderable: false}
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
            btnShow: async function (id) {
                const {data} = await axios.get(route('employees.show', id));
                const employee = data.data;
                if (data.status) {
                    $('#showEmployee .block-title').text(employee.name);
                    for (let key in employee) {
                        if (employee.hasOwnProperty(key)) {
                            if (key === 'salary') {
                                $(`#${key}`).text(new Intl.NumberFormat('es-CO', {
                                    style: 'currency',
                                    currency: 'COP',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(parseFloat(employee[key])));
                            } else {
                                if (key === 'status') {
                                    if (employee[key] === true) {
                                        $(`#${key}`).addClass('badge bg-success pt-1').text('Activo');
                                    } else {
                                        $(`#${key}`).addClass('badge bg-danger pt-1').text('Inactivo');
                                    }
                                } else if (key === 'start_date') {
                                    const date = new Date(employee[key]).toLocaleDateString();
                                    $(`#${key}`).text(date.replace(/\//g, '-'));
                                } else if (key === 'contacts') {
                                    if (employee[key].length > 0) {
                                        $('#contentContacts').removeClass('d-none');
                                        $('#contacts').html('');
                                        let table = '<table class="table table-hover table-sm">';
                                        table += '<thead class="text-capitalize"><tr><th>Nombre</th><th>Teléfono</th><th>Parentesco</th></tr></thead>';
                                        for (let i = 0; i < employee[key].length; i++) {
                                            table += `<tr><td>${employee[key][i].name}</td><td>${employee[key][i].phone}</td><td>${employee[key][i].relationship}</td></tr>`;
                                        }
                                        table += '</table>';
                                        $('#contacts').append(table);
                                    }
                                } else {
                                    $(`#${key}`).text(employee[key]);
                                }
                            }
                        }
                    }
                    $('#showEmployee').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar empleado con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar empleado con id: ' + id);
            }
        };
    </script>
@endsection
