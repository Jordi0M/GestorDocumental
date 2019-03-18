<style>
#errores{
    color:green;
}
</style>
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal_actualizar_fichero">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        	<div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header" id="modal-header-nuevo-fichero">
                    <h5 class="modal-title">Modificar fichero</h5>
                    <div class="alert alert-danger" id="errores_actualizar_fichero" role="alert" style="display:none;">
                        <p id="p_error_actualizar_fichero"></p>
                    </div>
                </div>
               
                <div class="modal-body">
                    <form method="POST" id="form_modal_actualizar_fichero" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div>   
                            <div class="form-group">
                                    <h3>Tipo de documento:</h3>
                                    <br>
                                    <label class="label_tipo_de_documento"></label>
                                    <input type="text" class="input_tipo_de_documento" name="tipo_de_documento" readonly hidden>
                                    <input type="text" class="documento_a_actualizar" name="documento_a_actualizar" readonly hidden>
                                    <br>
                            </div>
                            <div class="form-group">
                                    <h3>Introduce un nombre para el fichero:</h3>
                                    <br>
                                    <input type="text" name="nombre_del_documento" id="nombre_del_documento_actualizar_fichero" required>
                                    <br>
                            </div>
                            <div class="form-group">
                                <h3>Introduce el nuevo fichero</h3>
                                <label>El anterior se eliminará</label>
                                <br>
                                <input type="file" name="documento" id="subida_documento_actualizar_fichero" accept="application/pdf">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="click_cerrar_actualizar_fichero" >Close</button>
                        <button class="btn btn-success" id="boton_guardar_cambios_actualizar_fichero">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>