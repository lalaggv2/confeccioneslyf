<!-- Modal -->
<div class="modal fade" id="edit{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR CLIENTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('home.update',$empleado->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="" class="form-label">id</label>
                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$empleado->id}}"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$empleado->nombre}}"
                />
                
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">direccion</label>
                <input
                    type="text"
                    class="form-control"
                    name="direccion"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$empleado->direccion}}"
                />
                
            </div>
            <div class="mb-3">
              <label for="" class="form-label">telefono</label>
              <input
                  type="text"
                  class="form-control"
                  name="telefono"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                  value="{{$empleado->telefono}}"
              />
              
          </div>
          <div class="mb-3">
            <label for="" class="form-label">cargo</label>
            <input
                type="text"
                class="form-control"
                name="cargo"
                id=""
                aria-describedby="helpId"
                placeholder=""
                value="{{$empleado->cargo}}"
            />
            
        </div>
            <div class="mb-3">
              <label for="" class="form-label">salario</label>
              <input
                  type="text"
                  class="form-control"
                  name="salario"
                  id=""
                  aria-describedby="helpId"
                  placeholder=""
                  value="{{$empleado->salario}}"
              />
              
          </div>
            
           
          <div class="mb-3">
            <label for="" class="form-label">correo</label>
            <input
                type="text"
                class="form-control"
                name="correo"
                id=""
                aria-describedby="helpId"
                placeholder=""
                value="{{$empleado->correo}}"
            />
            
        
       
          
          
      </div>
            
        </div>
        <div class="modal-footer">
          <button type="sumit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="sumit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>







  <!-- Modal -->
  <div class="modal fade" id="delete{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">eliminar CLIENTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('home.destroy',$empleado->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('DELETE')
        <div class="modal-body">
           estas seguro que deseas eliminar a <strong> {{$empleado->nombre}}?</strong>
            
        </div>
        <div class="modal-footer">
          <button type="sumit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="sumit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
      </div>
    </div>
  </div>