@extends('home')



@section ('content')

<div
    class="row"
>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <h3>LISTA DE EMPLEADOS</h3>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Nuevo
          </button>
        <div
            class="table-responsive"
        >
            <table
                class="table"
            >
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">TELEFONO</th>
                        <th scope="col">CARGO</th>
                        <th scope="col">SALARIO</th>
                        <th scope="col">CORREO</th>
                        

                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($empleados as $empleado)
                       
                
                    <tr class="">
                        <td scope="row">{{$empleado->id}}</td>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->direccion}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>{{$empleado->cargo}}</td>
                        <td>{{$empleado->salario}}</td>
                        <td>{{$empleado->correo}}</td>
                        <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$empleado->id}}">
                            modificar
                          </button></td>
                          <td>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$empleado->id}}">
                            eliminar
                          </button>
                          </td>
                    
                    </tr>

                    @Include('empleados.info')
                    @endforeach
                </tbody>
            </table>
        </div>

        @Include('empleados.create')
        
    </div>
    <div class="colmd-2"></div>
</div>















@endsection