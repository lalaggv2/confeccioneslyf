@extends('layouts.app')

@section('title')
    PROVEEDORES
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>PROVEEDORES</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar proveedor</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableSuppliers" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <th>ID</th>
                        <th>Tipo de documento</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="showSupplier" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableSuppliers').DataTable({
                ajax: route('suppliers'),
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
                    loadingRecords: "Cargando lista de proveedores...",
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
                const {data} = await axios.get(route('suppliers.show', id));
                const supplier = data.data;
                if (data.status) {
                    $('#showSupplier .block-title').text(supplier.name);
                    for (let key in supplier) {
                        if (supplier.hasOwnProperty(key)) {
                            $(`#${key}`).text(supplier[key]);
                        }
                    }
                    $('#showSupplier').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar proveedor con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar proveedor con id: ' + id);
            }
        };
    </script>
@endsection
