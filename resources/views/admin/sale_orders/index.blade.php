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
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="showsaleOrder" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                    
                            <li class="list-group-item"><b>Cliente:</b> <label id="customer_id"></label></li>
                            <li class="list-group-item"><b>Código:</b> <label id="code"></label></li>
                            <li class="list-group-item"><b>Cantidad:</b> <label id="quantity"></label></li>
                            <li class="list-group-item"><b>Total:</b> <label id="total"></label></li>
                            <li class="list-group-item"><b>Método de pago:</b> <label id="payment_method"></label></li>
                            <li class="list-group-item"><b>Referencia:</b> <label id="reference"></label></li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de edición de orden de venta -->
<div class="modal" id="updateSaleOrder" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-uppercase">Editar Orden de Venta</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <form id="editSaleOrderForm">
                        @csrf
                        <input type="hidden" id="editSaleOrderId" name="id">
                        <div class="form-group">
                            <label for="editCustomerid">Cliente</label>
                            <input type="text" class="form-control" id="editCustomerid" name="customer_id">
                        </div>
                        <div class="form-group">
                            <label for="editCode">Código</label>
                            <input type="text" class="form-control" id="editCode" name="code">
                        </div>
                        <div class="form-group">
                            <label for="editQuantity">Cantidad</label>
                            <input type="text" class="form-control" id="editQuantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="editTotal">Total</label>
                            <input type="text" class="form-control" id="editTotal" name="total">
                        </div>
                        <div class="form-group">
                            <label for="editPaymentMethod">Método de Pago</label>
                            <input type="text" class="form-control" id="editPaymentMethod" name="payment_method">
                        </div>
                        <div class="form-group">
                            <label for="editReference">Referencia</label>
                            <input type="text" class="form-control" id="editReference" name="reference">
                        </div>
                        <!-- Otros campos del formulario... -->

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="saveEditedSaleOrder" class="btn btn-primary">Guardar Cambios</button>
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
        // Manejar el envío del formulario de edición de orden de venta
        $('#editSaleOrderForm').submit(function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los datos del formulario
            const formData = $(this).serialize();

            // Enviar los datos actualizados al servidor a través de una solicitud AJAX
            $.ajax({
                url: '/sale_orders/' + $('#editSaleOrderId').val(), // URL para la actualización de la orden de venta
                type: 'PUT', // Método HTTP para la actualización
                data: formData, // Datos del formulario serializados
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Manejar la respuesta exitosa del servidor
                    alert('Orden de venta actualizada correctamente');
                    $('#editSaleOrder').modal('hide'); // Cerrar el modal de edición después de la actualización
                    // Actualizar la tabla si es necesario
                },
                error: function(err) {
                    // Manejar errores de la solicitud AJAX
                    console.error('Error al actualizar la orden de venta:', err);
                    alert('Hubo un error al actualizar la orden de venta');
                }
            });
        });
    });
</script>

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
                    $('#showsaleorder .block-title').text('Orden de compra #' + saleOrder.id);
                    $('#customer_id').text(saleOrder.customer_id);
                    $('#code').text(saleOrder.code);
                    $('#quantity').text(saleOrder.quantity);
                    $('#total').text(new Intl.NumberFormat('es-CO', {
                        style: 'currency',
                        currency: 'COP',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(parseFloat(saleOrder.total)));
                    $('#payment_method').text(saleOrder.payment_method);
                    $('#reference').text(saleOrder.reference);
                    
                    $('#created_at').text(new Date(saleOrder.created_at).toLocaleString());
                    $('#updated_at').text(new Date(saleOrder.updated_at).toLocaleString());
                    $('#showsaleOrder').modal('show');
                }
            },
            
            btnDelete: function (id) {
                   if (confirm('¿Estás seguro de que deseas eliminar esta venta?')) {
                    $.ajax({
            url: '/sale_orders/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('venta eliminada correctamente');
                
            },
           
        });
    }
},
btnEdit: async function (id) {
    try {
        // Hacer una solicitud AJAX GET para obtener los datos de la orden de venta
        const response = await axios.get(`/sale_orders/${id}`);

        // Verificar si la solicitud fue exitosa
        if (response.status === 200 && response.data.status) {
            const saleOrder = response.data.data;
            console.log(saleOrder);

            // Rellenar un formulario modal con los datos de la orden de venta
            $('#updateSaleOrder #editSaleOrderId').val(saleOrder.id);
            $('#updateSaleOrder #editSaleOrderCustomerid').val(saleOrder.customer_id);
            $('#updateSaleOrder #editSaleOrderCode').val(saleOrder.code);
            $('#updateSaleOrder #editSaleOrderQuantity').val(saleOrder.quantity);
            $('#updateSaleOrder #editSaleOrderTotal').val(saleOrder.total);
            $('#updateSaleOrder #editSaleOrderPaymentMethod').val(saleOrder.payment_method);
            $('#updateSaleOrder #editSaleOrderReference').val(saleOrder.reference);
            $('#updateSaleOrder #editSaleOrderStatus').val(saleOrder.status);

            // Mostrar el formulario modal para permitir la edición
            $('#updateSaleOrder').modal('show');
        } else {
            // Manejar el caso en el que no se encuentre la orden de venta o haya un error
            alert('No se pudo obtener la información de la orden de venta');
        }
    } catch (error) {
        console.error('Error al obtener la información de la orden de venta:', error);
        alert('Hubo un error al obtener la información de la orden de venta');
    }
}

        };
    </script>
@endsection
