@extends('layouts.app')

@section('title')
    EMPLEADOS
@endsection

@section('css')
    <!-- Incluir estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluir estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>PRODUCT DETAILS</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Add product details</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableProductDetails" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Barcode</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Material</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Manufactured</th>
                        <th>Notes</th>
                        <th class="text-center">Actions</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showProductDetail" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Contenido del modal -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Incluir DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- Incluir axios para hacer solicitudes HTTP -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    loadingRecords: "Cargando lista de detalles del producto...",
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
                    $('#showProductDetail .block-title').text(productDetail.product_name);
                    for (let key in productDetail) {
                        if (productDetail.hasOwnProperty(key)) {
                            if (key === 'price') {
                                $(`#${key}`).text(new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'USD',
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }).format(parseFloat(productDetail[key])));
                            } else if (key === 'date_manufactured') {
                                const date = new Date(productDetail[key]).toLocaleDateString();
                                $(`#${key}`).text(date.replace(/\//g, '-'));
                            } else {
                                $(`#${key}`).text(productDetail[key]);
                            }
                        }
                    }
                    $('#showProductDetail').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Edit product detail with ID: ' + id);
            },
            btnDelete: function (id) {
                alert('Delete product detail with ID: ' + id);
            }
        };
    </script>
@endsection
