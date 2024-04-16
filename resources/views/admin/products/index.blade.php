@extends('layouts.app')

@section('title')
    PRODUCTOS
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection

@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-box me-2"></i>PRODUCTOS</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar producto</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableProducts" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Tipo</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Actualización</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showProduct" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>Descripción:</b> <label id="description"></label></li>
                            <li class="list-group-item"><b>Stock:</b> <label id="stock"></label></li>
                            <li class="list-group-item"><b>Tipo:</b> <label id="type"></label></li>
                            <li class="list-group-item"><b>Fecha de Creación:</b> <label id="created_at"></label></li>
                            <li class="list-group-item"><b>Fecha de Actualización:</b> <label id="updated_at"></label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="destroyProduct" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
@endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableProducts').DataTable({
                ajax: route('products'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'name', orderable: false},
                    {data: 'description', orderable: false},
                    {data: 'stock', orderable: false},
                    {data: 'type', orderable: false},
                    {data: 'created_at', orderable: false},
                    {data: 'updated_at', orderable: false},
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
                    loadingRecords: "Cargando lista de productos...",
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
                const {data} = await axios.get(route('products.show', id));
                const product = data.data;
                if (data.status) {
                    $('#showProduct.block-title').text(product.name);
                    for (let key in product) {
                        if (product.hasOwnProperty(key)) {
                            $(`#${key}`).text(product[key]);
                        }
                    }
                    $('#showProduct ').modal('show');
                }
            }, 
        
            btnEdit: function (id) {
                alert('Editar producto con id: ' + id);
            },
            btnDelete: function (id) {
                   if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                    $.ajax({
            url: '/products/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('producto eliminado correctamente');
                
            },
           
        });
    }
}
        };
    </script>
@endsection
