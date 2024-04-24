@extends('layouts.app')
@section('title' )
    EMPLEADOS
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection
@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>EMPLEADOS</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar empleado</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tableEmployees" class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>EPS</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="showEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <li class="list-group-item"><b>Correo:</b> <label id="email"></label></li>
                            <li class="list-group-item"><b>Genero:</b> <label id="gender"></label></li>
                            <li class="list-group-item"><b>RH:</b> <span class="badge text-bg-info pt-2" id="rh"></span></li>
                            <li class="list-group-item"><b>EPS:</b> <label id="eps"></label></li>
                            <li class="list-group-item"><b>Cargo:</b> <span class="badge text-bg-primary pt-2"
                                                                     id="position"></span></li>
                            <li class="list-group-item"><b>Salario:</b> <label id="salary"></label></li>
                            <li class="list-group-item"><b>Fecha de ingreso a la empresa:</b> <label id="start_date"></label>
                            </li>
                            <li class="list-group-item d-none" id="contentContacts">
                                <h5 class="mb-0">CONTACTOS</h5>
                                <div id="contacts">

                                </div>
                            </li>
                            <li class="list-group-item">Estado: <label id="status"></label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="updateEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title text-uppercase">Editar Empleado</h3>
                    <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
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
                        <div class="form-group">
                            <label for="editGender">Genero</label>
                            <input type="text" class="form-control" id="editGender" name="gender">
                        </div>
                        <div class="form-group">
                            <label for="editRh">Rh</label>
                            <input type="text" class="form-control" id="editRh" name="rh">
                        </div>
                        <div class="form-group">
                            <label for="editEps">Eps</label>
                            <input type="text" class="form-control" id="editEps" name="eps">
                        </div>
                        <div class="form-group">
                            <label for="editPosition">position</label>
                            <input type="text" class="form-control" id="editPosition" name="position">
                        </div>
                        <div class="form-group">
                            <label for="editSalary">Salario</label>
                            <input type="text" class="form-control" id="editSalary" name="salary">
                        </div>
                        <div class="form-group">
    <label for="editStartDate">Fecha de Inicio</label>
    <input type="date" class="form-control" id="editStartDate" name="start_date" required>
</div>
<div class="form-group">
    <label for="editStatus">Estado</label>
    <select class="form-control" id="editStatus" name="status" required>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>
</div>

<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="close">Cancelar</button>
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
                url: '/employees/' + $('#editId').val(), // URL para la actualización del proveedor
                type: 'PUT', // Método HTTP para la actualización
                data: formData, // Datos del formulario serializados
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
        // Mostrar la respuesta en la consola del navegador
        console.log(response);
        alert('Empleado actualizado correctamente');

        // Recargar la página después de editar el empleado
        location.reload();
                },
                error: function(err) {
                    // Manejar errores de la solicitud AJAX
                    console.error('Error al actualizar el empleado:', err);
                    alert('Hubo un error al actualizar el empleado');
                }
            });
        });
    });
</script>
    <script>
        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableEmployees').DataTable({
                ajax: route('employees'),
                filter: true,
                columns: [
                    {data: 'id'},
                    {data: 'name', orderable: false},
                    {data: 'document', orderable: false},
                    {data: 'phone', orderable: false},
                    {data: 'eps', orderable: false},
                    {data: 'position', orderable: false},
                    {data: 'salary', orderable: false},
                    {data: 'status', orderable: false, class: 'text-center'},
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
                    loadingRecords: "Cargando lista de empleados...",
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
                const {data} = await axios.get(route('employees.show', id));
                const employee = data.data;
                if (data.status) {
                    $('#showEmployee .block-title').text(employee.name);
                    for (let key in employee) {
                        if (employee.hasOwnProperty(key)) {
                            if (key === 'salary') {
                                $(`#${key}`).text(new Intl.NumberFormat('es-CO', {
                                    style: 'currency',
                                    currency: 'COP',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(parseFloat(employee[key])));
                            } else {
                                if (key === 'status') {
                                    if (employee[key] === true) {
                                        $(`#${key}`).addClass('badge bg-success pt-1').text('Activo');
                                    } else {
                                        $(`#${key}`).addClass('badge bg-danger pt-1').text('Inactivo');
                                    }
                                } else if (key === 'start_date') {
                                    const date = new Date(employee[key]).toLocaleDateString();
                                    $(`#${key}`).text(date.replace(/\//g, '-'));
                                } else if (key === 'contacts') {
                                    if (employee[key].length > 0) {
                                        $('#contentContacts').removeClass('d-none');
                                        $('#contacts').html('');
                                        let table = '<table class="table table-hover table-sm">';
                                        table += '<thead class="text-capitalize"><tr><th>Nombre</th><th>Teléfono</th><th>Parentesco</th></tr></thead>';
                                        for (let i = 0; i < employee[key].length; i++) {
                                            table += `<tr><td>${employee[key][i].name}</td><td>${employee[key][i].phone}</td><td>${employee[key][i].relationship}</td></tr>`;
                                        }
                                        table += '</table>';
                                        $('#contacts').append(table);
                                    }
                                } else {
                                    $(`#${key}`).text(employee[key]);
                                }
                            }
                        }
                    }
                    $('#showEmployee').modal('show');
                }
            },
           
    
            btnDelete: function (id) {
    if (confirm('¿Estás seguro de que deseas eliminar este empleado?')) {
        $.ajax({
            url: '/employees/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
        // Mostrar la respuesta en la consola del navegador
        console.log(response);
        alert('Empleado eliminado correctamente');

        // Recargar la página después de eliminar el empleado
        location.reload();
            },
            error: function(xhr, textStatus, errorThrown) {
                // Mostrar el error en la consola del navegador
                console.error('Error al eliminar el empleado:', errorThrown);
                alert('Hubo un error al eliminar el empleado');
            }
        });
    }
},
btnEdit: async function (id) {
    try {
        // Hacer una solicitud AJAX GET para obtener los datos del empleado
        const response = await axios.get(`/employees/${id}`);

        // Verificar si la solicitud fue exitosa
        if (response.status === 200 && response.data.status) {
            const employee = response.data.data;

            // Rellenar un formulario modal con los datos del empleado
            $('#updateEmployee #editId').val(employee.id);
            $('#updateEmployee #editDocumentType').val(employee.document_type);
            $('#updateEmployee #editDocument').val(employee.document);
            $('#updateEmployee #editName').val(employee.name);
            $('#updateEmployee #editAddress').val(employee.address);
            $('#updateEmployee #editPhone').val(employee.phone);
            $('#updateEmployee #editEmail').val(employee.email);
            $('#updateEmployee #editGender').val(employee.gender);
            $('#updateEmployee #editRh').val(employee.rh);
            $('#updateEmployee #editEps').val(employee.eps);
            $('#updateEmployee #editPosition').val(employee.position);
            $('#updateEmployee #editSalary').val(employee.salary);
            $('#updateEmployee #editStatus').val(employee.status);


            // Mostrar el formulario modal para permitir la edición
            $('#updateEmployee').modal('show');
            
        } else {
            // Manejar el caso en el que no se encuentre el empleado o haya un error
            alert('No se pudo obtener la información del empleado');
        }
    } catch (error) {
        console.error('Error al obtener la información del empleado:', error);
        alert('Hubo un error al obtener la información del empleado');
    }
}


        };
    </script>
@endsection
