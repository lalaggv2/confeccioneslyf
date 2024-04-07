@extends('layouts.app')
@section('title' )
    CLIENTES
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css"/>
@endsection
@section('content')
    <div class="card p-3 position-relative">
        <h2 class="content-heading"><i class="fa fa-users me-2"></i>CLIENTES</h2>
        <button type="button" class="btn btn-secondary w-25 btn-add" data-target="#create"><i class="fa fa-plus"></i> Agregar clientes</button>
        
        <div
            class="table-responsive"
        >
            <table
             id="tableEmployees" class="table table-bordered table-hover table-striped table-sm">
            
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tipo de documento</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nomnre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th class="text-center">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        
                  
                    <tr class="">
                        <td scope="row">{{$customer->id}}</td>
                        <td>{{$customers->type_document}}</td>
                        <td>{{$customers->document}}</td>
                        <td>{{$customers->name}}</td>
                        <td>{{$customers->address}}</td>
                        <td>{{$customers->phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    
@endsection
@section('js')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            let dataTabla = null;
            dataTabla = $('#tableCustomers').DataTable({
                ajax: route('customer'),
                filter: true,
                columns: [
                    {data: 'tipe_document'},
                    
                    {data: 'document', orderable: false},
                    {data: 'name', orderable: false},
                    {data: 'eps', orderable: false},
                    {data: 'phone', orderable: false},

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
                const {data} = await axios.get(route('customers.show', id));
                const customer = data.data;
                if (data.status) {
                    $('#showCustomer .block-title').text(customer.name);
                    for (let key in customer) {
                        if (customer.hasOwnProperty(key)) {
                            if (key === 'salary') {
                                $(`#${key}`).text(new Intl.NumberFormat('es-CO', {
                                    style: 'currency',
                                    currency: 'COP',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(parseFloat(customer[key])));
                            } else {
                                if (key === 'status') {
                                    if (customer[key] === true) {
                                        $(`#${key}`).addClass('badge bg-success pt-1').text('Activo');
                                    } else {
                                        $(`#${key}`).addClass('badge bg-danger pt-1').text('Inactivo');
                                    }
                                } else if (key === 'start_date') {
                                    const date = new Date(customer[key]).toLocaleDateString();
                                    $(`#${key}`).text(date.replace(/\//g, '-'));
                                } else if (key === 'contacts') {
                                    if (customer[key].length > 0) {
                                        $('#contentContacts').removeClass('d-none');
                                        $('#contacts').html('');
                                        let table = '<table class="table table-hover table-sm">';
                                        table += '<thead class="text-capitalize"><tr><th>Nombre</th><th>Teléfono</th><th>Parentesco</th></tr></thead>';
                                        for (let i = 0; i < customer[key].length; i++) {
                                            table += `<tr><td>${customer[key][i].name}</td><td>${customer[key][i].phone}</td><td>${customer[key][i].relationship}</td></tr>`;
                                        }
                                        table += '</table>';
                                        $('#contacts').append(table);
                                    }
                                } else {
                                    $(`#${key}`).text(customer[key]);
                                }
                            }
                        }
                    }
                    $('#showCustomer').modal('show');
                }
            },
            btnEdit: function (id) {
                alert('Editar empleado con id: ' + id);
            },
            btnDelete: function (id) {
                alert('Eliminar empleado con id: ' + id);
            }
        };
    </script>
@endsection
