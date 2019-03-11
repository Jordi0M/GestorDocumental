<style>
#errores{
    color:green;
}
</style>
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        	<div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Fichero</h5>
                </div>
                <br>
                
                <div class="modal-body">
                    <form method="POST" id="form_modal_nuevo_fichero">
                        {{ csrf_field() }}
                        <div>   
                            <div class="form-group">
                                    <label>Tipo de documento:</label>
                                    <br><br>
                                    <label id="label_tipo_de_documento"></label>
                                    <input type="text" id="input_tipo_de_documento" name="tipo_de_documento" hidden>
                                    <br>
                            </div>
                            <div class="form-group">
                                <label>Introduce el fichero</label>
                                <br>
                                <input type="file" name="documento">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>