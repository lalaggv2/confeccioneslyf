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
                            <li class="list-group-item"><b>SKU:</b> <label id="sku"></label></li>
                            <li class="list-group-item"><b>Código de barras:</b> <label id="barcode"></label></li>
                            <li class="list-group-item"><b>Tamaño:</b> <label id="size"></label></li>
                            <li class="list-group-item"><b>Color:</b> <label id="color"></label></li>
                            <li class="list-group-item"><b>Material:</b> <label id="material"></label></li>
                            <li class="list-group-item"><b>Ubicación:</b> <label id="location"></label></li>
                            <li class="list-group-item"><b>Precio:</b> <label id="price"></label></li>
                            

                            <li class="list-group-item"><b>Notas:</b> <label id="notes"></label></li>
                            <li class="list-group-item"><b>Fecha de Creación:</b> <label id="created_at"></label></li>
                            <li class="list-group-item"><b>Fecha de Actualización:</b> <label id="updated_at"></label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de edición -->
<div class="modal" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-uppercase">Editar Producto</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <form id="editProductForm">
                        @csrf
                        <input type="hidden" id="editProductId" name="id">
                        <div class="form-group">
                            <label for="editProductName">Nombre</label>
                            <input type="text" class="form-control" id="editProductName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Descripción</label>
                            <textarea class="form-control" id="editProductDescription" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductStock">Stock</label>
                            <input type="text" class="form-control" id="editProductStock" name="stock">
                        </div>
                        <div class="form-group">
                            <label for="editProductType">Tipo</label>
                            <input type="text" class="form-control" id="editProductType" name="type">
                        </div>
                        <div class="form-group">
                            <label for="editProductSku">SKU</label>
                            <input type="text" class="form-control" id="editProductSku" name="sku">
                        </div>
                        <div class="form-group">
                            <label for="editProductBarcode">Código de barras</label>
                            <input type="text" class="form-control" id="editProductBarcode" name="barcode">
                        </div>
                        <div class="form-group">
                            <label for="editProductSize">Tamaño</label>
                            <input type="text" class="form-control" id="editProductSize" name="size">
                        </div>
                        <div class="form-group">
                            <label for="editProductColor">Color</label>
                            <input type="text" class="form-control" id="editProductColor" name="color">
                        </div>
                        <div class="form-group">
                            <label for="editProductMaterial">Material</label>
                            <input type="text" class="form-control" id="editProductMaterial" name="material">
                        </div>
                        <div class="form-group">
                            <label for="editProductLocation">Ubicación</label>
                            <input type="text" class="form-control" id="editProductLocation" name="location">
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Precio</label>
                            <input type="text" class="form-control" id="editProductPrice" name="price">
                        </div>
                        <div class="form-group">
                            <label for="editProductNotes">Notas</label>
                            <textarea class="form-control" id="editProductNotes" name="notes"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductCreatedAt">Fecha de Creación</label>
                            <input type="text" class="form-control" id="editProductCreatedAt" name="created_at">
                        </div>
                        <div class="form-group">
                            <label for="editProductUpdatedAt">Fecha de Actualización</label>
                            <input type="text" class="form-control" id="editProductUpdatedAt" name="updated_at">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
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
        // Manejar el envío del formulario de edición de producto
        $('#editProductForm').submit(function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los datos del formulario
            const formData = $(this).serialize();

            // Enviar los datos actualizados al servidor a través de una solicitud AJAX
            $.ajax({
                url: '/products/' + $('#editProductId').val(), // URL para la actualización del producto
                type: 'PUT', // Método HTTP para la actualización
                data: formData, // Datos del formulario serializados
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Manejar la respuesta exitosa del servidor
                    alert('Producto actualizado correctamente');
                    $('#updateProduct').modal('hide'); // Cerrar el modal de edición después de la actualización
                    // Actualizar la tabla si es necesario
                },
                error: function(err) {
                    // Manejar errores de la solicitud AJAX
                    console.error('Error al actualizar el producto:', err);
                    alert('Hubo un error al actualizar el producto');
                }
            });
        });
    });
</script>

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
                            if (document.getElementById(key)) {
                                $(`#${key}`).text(product[key]);
                            }
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
},
btnEdit: async function (id) {
    try {
        // Hacer una solicitud AJAX GET para obtener los datos del producto
        const response = await axios.get(`/products/${id}`);

        // Verificar si la solicitud fue exitosa
        if (response.status === 200 && response.data.status) {
            const product = response.data.data;

            

            // Rellenar un formulario modal con los datos del producto
            $('#updateProduct #editProductId').val(product.id);
            $('#updateProduct #editProductName').val(product.name);
            $('#updateProduct #editProductDescription').val(product.description);
            $('#updateProduct #editProductStock').val(product.stock);
            $('#updateProduct #editProductType').val(product.type);
            $('#updateProduct #editProductSku').val(product.sku);
            $('#updateProduct #editProductBarcode').val(product.barcode);
            $('#updateProduct #editProductSize').val(product.size);
            $('#updateProduct #editProductColor').val(product.color);
            $('#updateProduct #editProductMaterial').val(product.material);
            $('#updateProduct #editProductLocation').val(product.location);
            $('#updateProduct #editProductPrice').val(product.price);
            $('#updateProduct #editProductNotes').val(product.notes);
            $('#updateProduct #editProductCreatedAt').val(product.created_at);
            $('#updateProduct #editProductUpdatedAt').val(product.updated_at);

            // Mostrar el formulario modal para permitir la edición
            $('#updateProduct').modal('show');
        } else {
            // Manejar el caso en el que no se encuentre el producto o haya un error
            alert('No se pudo obtener la información del producto');
        }
    } catch (error) {
        console.error('Error al obtener la información del producto:', error);
        alert('Hubo un error al obtener la información del producto');
    }
}

        };
    </script>
@endsection
