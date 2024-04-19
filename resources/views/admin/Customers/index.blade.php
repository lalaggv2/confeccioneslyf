@extends('layouts.app')

@section('title')
    CLIENTES
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>CLIENTES</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar cliente</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableCustomers" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <th>ID</th>
                        <th>TIPO DE DOCUMENTO</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>DIRECCION</th>
                        <th class="text-center">ACCIONES</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showCustomer" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>Tipo documento:</b> <label id="document_type"></label></li>
                            <li class="list-group-item"><b>Documento:</b> <label id="document"></label></li>
                            <li class="list-group-item"><b>Nombre:</b> <label class="text-capitalize" id="name"></label></li>
                            <li class="list-group-item"><b>Teléfono:</b> <label id="phone"></label></li>
                            <li class="list-group-item"><b>Dirección:</b> <label id="address"></label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="destroyCustomer" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        const customersRoute = "{{ route('customers') }}";

        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableCustomers').DataTable({
                ajax: customersRoute,
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'document_type', orderable: false},
                    {data: 'document', orderable: false},
                    {data: 'name', orderable: false},
                    {data: 'phone', orderable: false},
                    {data: 'address', orderable: false},
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
                    loadingRecords: "Cargando lista de clientes...",
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
                const {data} = await axios.get(route('customers.show', id));
                const customer = data.data;
                if (data.status) {
                    $('#showCustomer .block-title').text(customer.name);
                    for (let key in customer) {
                        if (customer.hasOwnProperty(key)) {
                            $(`#${key}`).text(customer[key]);
                        }
                    }
                    $('#showCustomer').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar cliente con id: ' + id);
            },
            btnDelete: function (id) {
                if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
                    $.ajax({
                        url: '/customers/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert('Cliente eliminado correctamente');
                            // Actualizar la tabla si es necesario
                        },
                    });
                }
            }
        };
    </script>
@endsection
