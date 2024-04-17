@extends('layouts.app')

@section('title')
    ORDENES DE VENTA
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-shopping-cart me-2"></i>ORDENES DE VENTA</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar orden de venta</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableSaleOrders" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <tr>
                         
                            
                            <th>Cliente</th>
                            <th>Código</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Método de Pago</th>
                            <th>Referencia</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showSaleOrder" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>Cliente:</b> <label id="customers_id"></label></li>
                            <li class="list-group-item"><b>Código:</b> <label id="code"></label></li>
                            <li class="list-group-item"><b>Cantidad:</b> <label id="quantity"></label></li>
                            <li class="list-group-item"><b>Total:</b> <label id="total"></label></li>
                            <li class="list-group-item"><b>Método de pago:</b> <label id="payment_method"></label></li>
                            <li class="list-group-item"><b>Referencia:</b> <label id="reference"></label></li>
                            <li class="list-group-item"><b>Estado:</b> <label id="status"></label></li>
                            
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
            dataTabla = $('#tableSaleOrders').DataTable({
                ajax: route('sale_orders'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'customer_id', orderable: false},
                    {data: 'code'},
                    {data: 'quantity'},
                    {data: 'total'},
                    {data: 'payment_method'},
                    {data: 'reference'},
                    {data: 'status'},
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
                    loadingRecords: "Cargando lista de ordenes de venta...",
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
                const {data} = await axios.get(route('sale_orders.show', id));
                const saleOrder = data.data;
                if (data.status) {
                    $('#showSaleOrder .block-title').text('Orden de venta #' + saleOrder.id);
                    $('#showSaleOrder').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar orden de venta con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar orden de venta con id: ' + id);
            }
        };
    </script>
@endsection
