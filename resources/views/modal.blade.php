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
                <button><span id="boton_modal_cerrar" class="glyphicon glyphicon-remove"></span></button>
                </div>
            </div>
      <div class="modal-body">
        <form action="/" method="POST" id="form_modal">
            {{ csrf_field() }}
            <div style="display:flex;">   
                <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <!--Admitiremos nombres de cualquier nacionalidad, incluyendo nombres compuestos y la mayoría de normas de acentuación. El número de caracteres será como mínimo 3 y como máximo 32.-->
                        <input type="text" name="nombre" class="form-control " required pattern="[A-Za-z0-9]{5,40}" placeholder="Nombre..."><i class="fa fa-check check-ok"></i>
                        
                </div>

                <div class="form-group">
                    <label for="documento">DNI/NIF</label>
                    <input type="text" name="documento"  class="form-control" required pattern="^[A-Z|\d](-)?\d{7}[A-Z|\d]" placeholder="DNI/NIF..."><i class="fa fa-check check-ok"></i>
                </div>
            </div>
                <!--------->
            <div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <!--Sólo se permiten letras (mayúsculas y minúsculas) y números-->
                    <input type="text" name="direccion" id="direcciones"class="form-control" minlength="5" maxlength="40" required pattern="[A-Za-z0-9]+" placeholder="Direccion..."><i class="fa fa-check check-ok"></i>
                </div>
            </div>
                <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <!--Sólo se permiten letras (mayúsculas y minúsculas)-->
                    <input type="text" name="provincia" class="form-control" minlength="5" maxlength="40" required pattern="[A-Za-z]+" placeholder="Provincia..."><i class="fa fa-check check-ok"></i>
                </div>
        
        
                <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <!-- Sólo se permiten letras (mayúsculas y minúsculas)-->
                        <input type="text" name="localidad" class="form-control" minlength="5" maxlength="40" required pattern="[A-Za-z]+" placeholder="Localidad..."><i class="fa fa-check check-ok"></i>
                </div>

                <div class="form-group">
                    <label for="cp">Codigo Postal</label>
                    <!--Sólo se permiten números min:5-max:5-->
                    <input type="text" name="cp" class="form-control" required pattern="^[0-5][1-9]{3}[0-9]$" placeholder="C.P..."><i class="fa fa-check check-ok"></i>
                </div>
            </div>
            <!--------->
            <div style="display:flex;">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <!--Sólo se permiten números con espacios y guiones-->
                    <input type="text" name="telefono" id="telefonos"class="form-control" required pattern="^(\+34|0034|34)?[\s|\-|\.]?[6|7|8|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$" placeholder="Telefono..."><i class="fa fa-check check-ok"></i>
                </div>

                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" class="form-control" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$" placeholder="Mail..."><i class="fa fa-check check-ok"></i>
                </div>
            </div>
            <!--------->


            <div class="modal-footer">
                <button class="btn btn-success" id="boton_cliente">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModalNuevoCliente()">Close</button>
            </div>
        </form>
        
    </div>
  </div>
</div>
  </form>
<!--Creamos una función que captará los errores del formulario en un modal-->
  <script>

$(document).ready(function() {
    
    $("#boton_cliente").click(function() {
        var nombre= $("input[name=nombre]").val();
        var documento=$("input[name=documento]").val();
        var direccion= $("input[name=direccion]").val();
        var cp=$("input[name=cp]").val();
        var telefono= $("input[name=telefono]").val();
        var mail=$("input[name=mail]").val();
        if(nombre<=0 || documento<=0 ||direccion<=0 ||cp<=0 ||telefono<=0 ||mail<=0){
            $("#errores").css("display","block");
            var errorP=$( document.createElement('p') );
            var $span = $( document.createElement('span') );
            errorP.append($span.addClass('parpadea text').text("Todos los campos son obligatorios"));
           $("#errores").append(errorP);
        }
        if(nombre.match(/[A-Za-z0-9]{5,40}/)) {
                $("#boton_cliente").submit();
            }else{
                $("#errores").css("display","block");
                var errorP=$( document.createElement('p') );
                var $span = $( document.createElement('span') );
                errorP.append($span.addClass('parpadea text').text("formato  de nombre no válido."));
                $("#errores").append(errorP);
            }
        
        if(cp.match(/^[0-5][1-9]{3}[0-9]$/)) {
                $("#boton_cliente").submit();
            }else{
                $("#errores").css("display","block");
                var errorP=$( document.createElement('p') );
                var $span = $( document.createElement('span') );
                errorP.append($span.addClass('parpadea text').text("Formato codigo postal incorrecto."));
                $("#errores").append(errorP);;
            }
        if(telefono.match(/^(\+34|0034|34)?[\s|\-|\.]?[6|7|8|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/)) {
                $("#boton_cliente").submit();
            }else{
                $("#errores").css("display","block");
                var errorP=$( document.createElement('p') );
                var $span = $( document.createElement('span') );
                errorP.append($span.addClass('parpadea text').text("Telefono no valido."));
                $("#errores").append(errorP);;
            }
        if(mail.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)) {
                $("#boton_cliente").submit();
            }else{
                $("#errores").css("display","block");
                var errorP=$( document.createElement('p') );
                var $span = $( document.createElement('span') );
                errorP.append($span.addClass('parpadea text').text("El mail no es correcto."));
                $("#errores").append(errorP);;
            }
        
    });


    $("#boton_modal_cerrar").click(function(){
        $("#errores").find("p").remove()   
        $("#errores").css("display","none");
    });


    $("#boton_cliente").click(function(){
        var NIF=$("input[name=documento]").val();
        String.prototype.isNif=function()
        {
        return /^(\d{7,8})([A-HJ-NP-TV-Z])$/.test(this) && ("TRWAGMYFPDXBNJZSQVHLCKE"[(RegExp.$1%23)]==RegExp.$2);
        };
        if (NIF.isNif()==true){
            $("#boton_cliente").submit();
        }
        else{
            NIF.remove();
            $("#errores").css("display","block");
            var errorP=$( document.createElement('p') );
            var $span = $( document.createElement('span') );
            errorP.append($span.addClass('parpadea text').text("El NIF no es válido."));
            $("#errores").append(errorP);
            
        }
    });
});
 
 
</script>
</div>