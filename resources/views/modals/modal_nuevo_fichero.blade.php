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
               
                <div class="modal-body">
                    <form method="POST" id="form_modal_nuevo_fichero" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div>   
                            <div class="form-group">
                                    <h3>Tipo de documento:</h3>
                                    <br>
                                    <label id="label_tipo_de_documento"></label>
                                    <input type="text" id="input_tipo_de_documento" name="tipo_de_documento" hidden>
                                    <br>
                            </div>
                            <div class="form-group">
                                    <h3>Introduce un nombre para el fichero:</h3>
                                    <br>
                                    <input type="text" name="nombre_del_documento" id="nombre_del_documento" required>
                                    <br>
                            </div>
                            <div class="form-group" id="div_subir_fichero">
                                <h3>Introduce el fichero</h3>
                                <br>
                                <input type="file" name="documento" id="subida_documento" accept="application/pdf">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" id="boton_guardar_cambios">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>