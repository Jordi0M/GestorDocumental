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
            <div style="display:flex;">   
                <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control"placeholder="Nombre...">
                </div>

                <div class="form-group">
                    <label for="descripcion">Documento</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="Documento...">
                </div>
            </div>
                <!--------->
            <div>
                <div class="form-group">
                    <label for="descripcion">Direccion</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="Direccion...">
                </div>
            </div>
                <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="descripcion">Provincia</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="Provincia...">
                </div>
        
        
                <div class="form-group">
                        <label for="nombre">Localidad</label>
                        <input type="text" name="nombre" class="form-control"placeholder="Documento...">
                </div>

                <div class="form-group">
                    <label for="descripcion">Codigo Postal</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="C.P...">
                </div>
            </div>
            <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="descripcion">Telefono</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="Telefono...">
                </div>

                <div class="form-group">
                    <label for="descripcion">Mail</label>
                    <input type="text" name="dereccion" class="form-control" placeholder="Mail...">
                </div>
            </div>
            <!--------->


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
            </div>
         
    </div>
  </div>
</div>
  </form>
</div>