@extends('layouts.app')

@section('title')
    DETALLE DE ÓRDENES
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-list me-2"></i>DETALLE DE ÓRDENES</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar detalle de orden</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableDetailOrders" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <th>ID</th>
                    <th>ID del objeto</th>
                    <th>Tipo del objeto</th>
                    <th>ID del producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th class="text-center">Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showDetailOrder" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>ID del objeto:</b> <label id="orderable_id"></label></li>
                            <li class="list-group-item"><b>Tipo del objeto:</b> <label id="orderable_type"></label></li>
                            <li class="list-group-item"><b>ID del producto:</b> <label id="product_id"></label></li>
                            <li class="list-group-item"><b>Cantidad:</b> <label id="quantity"></label></li>
                            <li class="list-group-item"><b>Precio:</b> <label id="price"></label></li>
                            <li class="list-group-item"><b>Total:</b> <label id="total"></label></li>
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
            dataTabla = $('#tableDetailOrders').DataTable({
                ajax: route('detail_orders'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'orderable_id'},
                    {data: 'orderable_type'},
                    {data: 'product_id'},
                    {data: 'quantity'},
                    {data: 'price'},
                    {data: 'total'},
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
                    loadingRecords: "Cargando lista de detalles de órdenes...",
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
                const {data} = await axios.get(route('detail_orders.show', id));
                const detailOrder = data.data;
                if (data.status) {
                    $('#showDetailOrder .block-title').text('Detalle de orden #' + detailOrder.id);
                    for (let key in detailOrder) {
                        if (detailOrder.hasOwnProperty(key)) {
                            $(`#${key}`).text(detailOrder[key]);
                        }
                    }
                    $('#showDetailOrder').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar detalle de orden con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar detalle de orden con id: ' + id);
            }
        };
    </script>
@endsection
