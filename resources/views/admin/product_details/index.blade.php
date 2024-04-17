@extends('layouts.app')

@section('title')
    DETALLES DEL PRODUCTO
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-boxes me-2"></i>DETALLES DEL PRODUCTO</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar detalles del producto</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableProductDetails" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>SKU</th>
                    <th>Código de barras</th>
                    <th>Tamaño</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Ubicación</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de fabricación</th>
                    <th>Notas</th>
                    <th class="text-center">Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="showproduct_details" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>Producto:</b> <label class="text-capitalize" id="product_name"></label></li>
                            <li class="list-group-item"><b>SKU:</b> <label id="sku"></label></li>
                            <li class="list-group-item"><b>Código de barras:</b> <label id="barcode"></label></li>
                            <li class="list-group-item"><b>Tamaño:</b> <label id="size"></label></li>
                            <li class="list-group-item"><b>Color:</b> <label id="color"></label></li>
                            <li class="list-group-item"><b>Material:</b> <label id="material"></label></li>
                            <li class="list-group-item"><b>Ubicación:</b> <label id="location"></label></li>
                            <li class="list-group-item"><b>Precio:</b> <label id="price"></label></li>
                            <li class="list-group-item"><b>Stock:</b> <label id="stock"></label></li>
                            <li class="list-group-item"><b>Fecha de fabricación:</b> <label id="date_manufactured"></label></li>
                            <li class="list-group-item"><b>Notas:</b> <label id="notes"></label></li>
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
            dataTabla = $('#tableProductDetails').DataTable({
                ajax: route('product_details'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'product_name', orderable: false},
                    {data: 'sku', orderable: false},
                    {data: 'barcode', orderable: false},
                    {data: 'size', orderable: false},
                    {data: 'color', orderable: false},
                    {data: 'material', orderable: false},
                    {data: 'location', orderable: false},
                    {data: 'price', orderable: false},
                    {data: 'stock', orderable: false},
                    {data: 'date_manufactured', orderable: false},
                    {data: 'notes', orderable: false},
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
                    loadingRecords: "Cargando detalles del producto...",
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
                const {data} = await axios.get(route('product_details.show', id));
                const productDetail = data.data;
                if (data.status) {
                    $('#showproduct_details .block-title').text(productDetail.name);
                    for (let key in productDetail) {
                        if (supplier.hasOwnProperty(key)) {
                            $(`#${key}`).text(productDetail[key]);
                        }
                    }
                    $('#showproduct_details').modal('show');
                }
            },
            btnDelete: function (id) {
                   if (confirm('¿Estás seguro de que deseas eliminar este detalle de producto?')) {
                    $.ajax({
            url: '/product_details/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('detalle del producto eliminado correctamente');
               
            },
           
        });
    }
}
        };
    </script>
@endsection
