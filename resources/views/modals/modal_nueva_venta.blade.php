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
                    <h5 class="modal-title">Nueva Venta</h5>
                </div>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">
                    <form method="POST" id="form_modal_nueva_venta">
                        {{ csrf_field() }}
                        <div>   
                            <div class="form-group">
                                    <label for="descripcion">Inserta una pequeña descripción</label>
                                    <br><br>
                                    <input name="descripcion" class="form-control" placeholder="Descripcion..." style="height: 5em">
                                    <br>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <br>
                                <select name="estado">
                                    <option value="0">Sin vender</option>
                                    <option value="1">Vendido</option>
                                </select>
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