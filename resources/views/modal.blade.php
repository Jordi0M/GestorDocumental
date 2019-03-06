@section('script')
<script>
    function Comprobar(){
        var name = document.getElementById('name').value;

        if(name.lenght <= 0){
            document.getElementById('Error').innerHTML = "No cumple con la validacion";
        }

        alert();
    }
    

</script>
@endsection

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
    <div class="modal-header">
      	
        <h5 class="modal-title">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/" method="POST">
            {{ csrf_field() }}
            <div style="display:flex;">   
                <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="name" class="form-control"placeholder="Nombre...">
                </div>

                <div class="form-group">
                    <label for="documento">DNI/NIF</label>
                    <input type="text" name="documento" id="dni" class="form-control" placeholder="DNI/NIF...">
                </div>
            </div>
                <!--------->
            <div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion...">
                </div>
            </div>
                <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input type="text" name="provincia" class="form-control" placeholder="Provincia...">
                </div>
        
        
                <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <input type="text" name="localidad" class="form-control"placeholder="Documento...">
                </div>

                <div class="form-group">
                    <label for="cp">Codigo Postal</label>
                    <input type="text" name="cp" class="form-control" placeholder="C.P...">
                </div>
            </div>
            <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono...">
                </div>

                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" class="form-control" placeholder="Mail...">
                </div>
            </div>
            <!--------->


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="ajaxSubmit" onclick="Comprobar()">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
  </form>
</div>