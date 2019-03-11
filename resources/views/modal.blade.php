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
      	
                <h5 class="modal-title">Nuevo Cliente</h5>
                <!--error modal-->
                
                <div class="alert alert-danger" id="errores" role="alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
      <div class="modal-body">
        <form action="/" method="POST" id="form_modal">
            {{ csrf_field() }}
            <div style="display:flex;">   
                <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="nombre" class="form-control is-invalid" placeholder="Nombre...">
                </div>

                <div class="form-group">
                    <label for="documento">DNI/NIF</label>
                    <input type="text" name="documento"  class="form-control" placeholder="DNI/NIF...">
                </div>
            </div>
                <!--------->
            <div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direcciones"class="form-control" placeholder="Direccion...">
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
                        <input type="text" name="localidad" class="form-control"placeholder="Localidad...">
                </div>

                <div class="form-group">
                    <label for="cp">Codigo Postal</label>
                    <input type="text" name="cp" class="form-control is-invalid" placeholder="C.P...">
                </div>
            </div>
            <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefonos"class="form-control" placeholder="Telefono...">
                </div>

                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" class="form-control" placeholder="Mail...">
                </div>
            </div>
            <!--------->


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        <button class="btn btn-success" id="ajaxSubmit" onclick="Comprobar()">Guardar Cambios</button>
    </div>
  </div>
</div>
  </form>
<!--Creamos una función que captará los errores del formulario en un modal-->
  <script>
    function Comprobar(){
        var nombre= $("input[name=nombre]").val();
        var documento=$("input[name=documento]").val();
        var direccion= $("input[name=direccion]").val();
        var cp=$("input[name=cp]").val();
        var telefono= $("input[name=telefono]").val();
        var mail=$("input[name=mail]").val();

        if(nombre <= 0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir un nombre."));
           $("#errores").append('<br/>');
        }if (documento <=0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir una NIF/CIF."));
            $("#errores").append('<br/>');
        }
        if(direccion <= 0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir una direccion."));
           $("#errores").append('<br/>');
        }if (cp <=0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir un codigo postal."));
            $("#errores").append('<br/>');
        }
        if(telefono <= 0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir un numero de telefono."));
           $("#errores").append('<br/>');
        }if (mail <=0){
            $("#errores").css("display","block");
            var $span = $( document.createElement('span') );
           $("#errores").append($span.addClass('parpadea text').text("Has de introducir un mail."));
            $("#errores").append('<br/>');
        }
        else{
            $("#form_modal").submit();
        }
        
        
    }
</script>
</div>