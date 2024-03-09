<!-- Modal -->
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AGREGAR CLIENTE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="" class="form-label">id</label>
                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Identicacion"
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
                    placeholder="nombre"
                   
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
                    placeholder="direccion"
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
                  placeholder="telefono"
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
                    placeholder="cargo"
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
                  placeholder="salario"
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
                    placeholder="correo"
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