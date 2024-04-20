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
                        <th>email</th>
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
                            <li class="list-group-item"><b>Nombre:</b> <label class="text-capitalize" id="name"></label></li> 
                            <li class="list-group-item"><b>Tipo documento:</b> <label id="document_type"></label></li>
                            <li class="list-group-item"><b>Documento:</b> <label id="document"></label></li>
                            <li class="list-group-item"><b>Teléfono:</b> <label id="phone"></label></li>
                            <li class="list-group-item"><b>Dirección:</b> <label id="address"></label></li>
                            <li class="list-group-item"><b>Email:</b> <label id="email"></label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="updateSupplier" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-uppercase">Editar Proveedor</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <form id="editForm">
                    <form id="editForm">
                    @csrf

                    <input type="hidden" id="editId" name="id">
                    
                        <div class="form-group">
                            <label for="editName">Nombre</label>
                            <input type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="editDocumentType">Tipo de Documento</label>
                            <input type="text" class="form-control" id="editDocumentType" name="document_type">
                            </div>

                        <div class="form-group">
                            <label for="editDocument">Documento</label>
                            <input type="text" class="form-control" id="editDocument" name="document">
                        </div>
                        <div class="form-group">
                            <label for="editPhone">Teléfono</label>
                            <input type="text" class="form-control" id="editPhone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="editAddress">Dirección</label>
                            <input type="text" class="form-control" id="editAddress" name="address">
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email">
                        </div>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
        // ... Otras funciones y configuraciones aquí ...

        // Manejar el envío del formulario de edición
        $('#editForm').submit(function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            // Obtener los datos del formulario
            const formData = $(this).serialize();

            // Enviar los datos actualizados al servidor a través de una solicitud AJAX
            $.ajax({
                url: '/suppliers/' + $('#editId').val(), // URL para la actualización del proveedor
                type: 'PUT', // Método HTTP para la actualización
                data: formData, // Datos del formulario serializados
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Manejar la respuesta exitosa del servidor
                    alert('Proveedor actualizado correctamente');
                    $('#updateSupplier').modal('hide'); // Cerrar el modal de edición después de la actualización
                    // Actualizar la tabla si es necesario
                },
                error: function(err) {
                    // Manejar errores de la solicitud AJAX
                    console.error('Error al actualizar el proveedor:', err);
                    alert('Hubo un error al actualizar el proveedor');
                }
            });
        });
    });
</script>

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
                    {data: 'email', orderable: false},
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

    btnDelete: function (id) {
        if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
            $.ajax({
                url: '/suppliers/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('Proveedor eliminado correctamente');
                    // Actualizar la tabla si es necesario
                },
                error: function(err) {
                    console.error('Error al eliminar el proveedor:', err);
                    alert('Hubo un error al eliminar el proveedor');
                }
            });
        }
    },

    btnEdit: async function (id) {
        try {
            // Hacer una solicitud AJAX GET para obtener los datos del proveedor
            const response = await axios.get(`/suppliers/${id}`);

            // Verificar si la solicitud fue exitosa
            if (response.status === 200 && response.data.status) {
                const supplier = response.data.data;

                // Rellenar un formulario modal con los datos del proveedor
                $('#updateSupplier #editId').val(supplier.id);
                $('#updateSupplier #editDocumentType').val(supplier.document_type);
                $('#updateSupplier #editDocument').val(supplier.document);
                $('#updateSupplier #editName').val(supplier.name);
                $('#updateSupplier #editAddress').val(supplier.address);
                $('#updateSupplier #editPhone').val(supplier.phone);
                $('#updateSupplier #editEmail').val(supplier.email);

                // Mostrar el formulario modal para permitir la edición
                $('#updateSupplier').modal('show');
            } else {
                // Manejar el caso en el que no se encuentre el proveedor o haya un error
                alert('No se pudo obtener la información del proveedor');
            }
        } catch (error) {
            console.error('Error al obtener la información del proveedor:', error);
            alert('Hubo un error al obtener la información del proveedor');
        }
        
    }
};

    </script>
@endsection
