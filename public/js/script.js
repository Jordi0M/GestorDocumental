function cerrarModalNuevoCliente(){

	window.location='/';
}

function cerrarModalNuevoFichero(id_venta, id_cliente){

	window.location='/cliente/venta/'+id_venta+'/'+id_cliente;
}

function listadoClientes(datosJSON){
	
	//php recoge los datos, y los guardamos en una variable de javascript
	var datos = datosJSON;
	//var enlace_nombre_cliente = "<a class='nombre_cliente'>";
	var icono_detalle_cliente = "<i class='fas fa-search-plus'>";

	for (var i = 0; i<datos.length; i++) {
		//declaramos primero el onclick del boton
		var onclick = "onclick=redirigir_a_DetalleClientes("+datos[i]["id"]+")";	

		//creamos el boton segun el dato que crea el for
		var boton_detalle_cliente = "<button type='button' class='btn btn-success'"+onclick+">";
		$(".tbody").append(//todo esto se añadira al tbody
			$("<tr>").append(//creamos un tr y añadiremos el contenido
				$("<th scope=row>").append(//comenzamos a añadir a los "td" tanto texto como botones
				$("<td>").text(datos[i]["nombre"])
				)).append(
				$("<td>").text(datos[i]["telefono"])
				).append(
				$("<td>").text(datos[i]["localidad"])
				).append(
				$("<td>").text(datos[i]["documento"])
				).append(
				$("<td>").append(//en este "td" meteremos un div con todos los botones
					$("<div style='width: 40%;'>").append(
						$(boton_detalle_cliente).append(//dentro del boton meteremos un icono y texto
						$(icono_detalle_cliente).text("Detalle"))
					)//cerramos el div
					)//cerramos el td
				)//cerramos el tr
		);//cerramos el tbody
	}//cerramos el for
}

function redirigir_a_DetalleClientes(id){

	window.location='/cliente/'+id;
}

function detalleCliente(datosJSON){
	//como en el array que recibe, solo es de un cliente propio, le daremos la primera posicon (0)
	var datos = datosJSON[0];

	//datos del cliente
	var nombre = $("<input type=text class=datos_detalle name=nombre disabled/>").val(datos["nombre"]);
	var documento = $("<input type=text class=datos_detalle name=documento disabled/>").val(datos["documento"]);
	var telefono = $("<input type=text class=datos_detalle name=telefono disabled/>").val(datos["telefono"]);
	var mail = $("<input type=label class=datos_detalle name=mail disabled/>").val(datos["mail"]);
	var direccion = $("<input type=label class=datos_detalle name=direccion disabled/>").val(datos["direccion"]);
	var provincia = $("<input type=label class=datos_detalle name=provincia disabled/>").val(datos["provincia"]);
	var localidad = $("<input type=label class=datos_detalle name=localidad disabled/>").val(datos["localidad"]);
	var cp = $("<input type=label class=datos_detalle name=cp disabled/>").val(datos["cp"]);

	$("#nombre_cliente").prepend("Cliente: "+datos["nombre"]+"\t");

	$(".detalles_cliente1").append(//le añadiremos un tr al tbody:
		$("<tr>").append(//al tr le iremos añadiendo varios td
			$("<td>").append(nombre//añadiremos el nombre al td
				)//cerramos el td
			).append(
			$("<td>").append(documento)
			).append(
			$("<td>").append(telefono)
			).append(
			$("<td>").append(mail)
			)//cerramos el td
	);//cerramos el tbody 1

	$(".detalles_cliente2").append(//este es el segundo tbody:
		$("<tr>").append(//como en el anterior ejemplo, seguimos añadiendo td al tr
			$("<td>").append(direccion//añadiremos el nombre al td
				)//cerramos el td
			).append(
			$("<td>").append(provincia)
			).append(
			$("<td>").append(localidad)
			).append(
			$("<td>").append(cp)
			)//cerramos el td
	);//cerramos el tbody 2
}

function editarDatos (){
	$(".datos_detalle").attr("disabled",false);//se quitara el disabled
	$(".datos_detalle").hover(function(){
		$(this).css("background-color","rgba(0,255,0,0.3)");//con esto se volvera verde al pasar por encima
		},
		function() {
	    	$(this).css('background-color', 'rgba(128, 255, 255, 0)');//con esto cuando quites el raton, estara blanco otra vez el fondo
	  	}
	)
	reemplazarBotonEditar();
}

function reemplazarBotonEditar (){
	$("#boton_editar_datos").text("Guardar")
	$( "#boton_editar_datos" ).on( "click",  guardarDatosEditados );
}

function guardarDatosEditados(){
	$("#formulario_de_editar").submit();
}

function detalleVenta(datosJSON, nombre_cliente){

	//como en el array que recibe, solo es de una venta propia, le daremos la primera posicon (0)
	var datos = datosJSON[0];
	var nombre_cliente = nombre_cliente[0];

	$("#nombre_cliente").prepend("Ventas del Cliente: "+nombre_cliente["nombre"]+"\t");

	
	if (datos["estado"] == 1){
		var estado_venta = "vendido";
	}
	else if (datos["estado"] == 0) {
		var estado_venta = "'sin vender'";
	}
	//datos de la venta
	var descripcion = $("<input type=text class=datos_detalle name=descripcion disabled/>").val(datos["descripcion"]);

	//depndiendo de cual tenga le servidor, le daremos un selected u otro
	if (datos["estado"] == 0) {
		var estado = $("<select name=estado class=datos_detalle disabled>"
					).append($("<option value=0 selected>").text("Sin vender")
					).append($("<option value=1>").text("Vendido"));
	}
	else if (datos["estado"] == 1){
		var estado = $("<select name=estado class=datos_detalle disabled>"
					).append($("<option value=0>").text("Sin vender")
					).append($("<option value=1 selected>").text("Vendido"));
	}
	
	//var fecha_modificacion = $("<input type=text value="+datos["updated_at"]+" name=fecha_modificacion readonly/>");
	var fecha_modificacion = $("<label>").text(datos["updated_at"]);

	$(".detalles_venta").append(//le añadiremos un tr al tbody:
		$("<tr>").append(//al tr le iremos añadiendo varios td
			$("<td>").append(descripcion//añadiremos el nombre al td
				)//cerramos el td
			).append(
			$("<td>").append(estado)
			).append(
			$("<td>").append(fecha_modificacion)
			)//cerramos el td
	);//cerramos el tbody 1

}

function listadoVentas(datosJSON){
	
	var datos = datosJSON;
	var icono_detalle_cliente = "<i class='fas fa-search-plus'>";

	for (var i = 0; i<datos.length; i++) {
		//declaramos primero el onclick del boton
		var onclick = "onclick=redirigir_a_DetalleVentas("+datos[i]["id"]+","+datos[i]["id_cliente"]+")";
		if (datos[i]["estado"] == 1){
			var estado = "vendido";
		}
		else if (datos[i]["estado"] == 0){
			var estado = "sin vender";
		}
		//creamos el boton segun el dato que crea el for
		var boton_detalle_cliente = "<button type='button' class='btn btn-success'"+onclick+">";
		$(".lista_ventas").append(//todo esto se añadira al tbody
			$("<tr>").append(//creamos un tr y añadiremos el contenido
				$("<th scope=row>").append(//comenzamos a añadir a los "td" tanto texto como botones
				$("<td>").text(datos[i]["id"]))
				).append(
				$("<td>").text(datos[i]["descripcion"])
				).append(
				$("<td>").text(estado)
				).append(
				$("<td>").text(datos[i]["updated_at"])
				).append(
				$("<td>").append(//en este "td" meteremos un div con todos los botones
					$("<div style='width: 40%;'>").append(
						$(boton_detalle_cliente).append(//dentro del boton meteremos un icono y texto
						$(icono_detalle_cliente).text("Detalle"))
					)//cerramos el div
					)//cerramos el td
				)//cerramos el tr
		);//cerramos el tbody
	}//cerramos el for
}

function redirigir_a_DetalleVentas(id,id_cliente){

	window.location='/cliente/venta/'+id+"/"+id_cliente;
}

function comprobarSiEsPDF(){
	var nombre_del_documento = $("#nombre_del_documento_nuevo_fichero").val();
    var doc = $("#subida_documento_nuevo_fichero").val();
    var extension = doc.split('.').pop();
    if (extension == "pdf" && nombre_del_documento.length>=1) {
    	$("#form_modal_nuevo_fichero").submit();
    }
    else{

    	$("#errores_nuevo_fichero").css("display","block");
    	$("#p_error_nuevo_fichero").remove();
    	$("#errores_nuevo_fichero").append(
    		$("<p id='p_error_nuevo_fichero'>").addClass('parpadea text').text("No has introducido un PDF, o no tiene nombre")
    	)
    }
}

function comprobarSiEsPDFv2(){
	var nombre_del_documento = $("#nombre_del_documento_actualizar_fichero").val();
    var doc = $("#subida_documento_actualizar_fichero").val();
    var extension = doc.split('.').pop();
    if (extension == "pdf" && nombre_del_documento.length>=1) {
    	$("#form_modal_actualizar_fichero").submit();
    }
    else{

    	$("#errores_actualizar_fichero").css("display","block");
    	$("#p_error_actualizar_fichero").remove();
    	$("#errores_actualizar_fichero").append(
    		$("<p id='p_error_actualizar_fichero'>").addClass('parpadea text').text("No has introducido un PDF, o no tiene nombre")
    	)
    }
}


//se utilizara para saber que tipo de documento va a saber
function indicarTipoDeDocumentoAlModal(){
	$(".agregar_documento").on("click", function(){
	var ruta_fichero = $(this).attr("ruta_fichero");

	if (ruta_fichero != null) {
		var ruta_fichero = ruta_fichero.replace("/storage/", "");
		$(".documento_a_actualizar").val(ruta_fichero);
	}
	
	var tipo_de_documento = $(this).data("documento");
	$(".label_tipo_de_documento").text(tipo_de_documento);
	$(".input_tipo_de_documento").val(tipo_de_documento);
	
	});
}

function listadoDocumentos(datosJSON){
	
	var datos = datosJSON;

	for (var i = 0; i<datos.length; i++) {

		var archivo = datos[i]["archivo"].replace("public", "/storage");
		//reemplazamos la carpeta "public" por "storage"

		var nombre_archivo_mostrar = archivo.replace("/storage/","");
		//mostraremos el archivo sin storage

		/*
		var nombre_archivo_mostrar = nombre_archivo_mostrar.replace("/",":");
		var nombre_archivo_mostrar = nombre_archivo_mostrar.replace("/",":");
		//como no dejaba guardar el fichero con dos puntos, anteriormente le añadimos la "/" para guardarlo
		//pero para mostrarlo, le daremos los dos puntos (lo pongo dos veces, porque hay 2)
		*/
		
		var nombre_archivo_mostrar = nombre_archivo_mostrar.split('_');

		//y segun el tipo de documento, lo añadimos en algun div u otro:
		if (datos[i]["tipo_documento"] == "presupuesto"){
			var tipo_factura = ".documentos_presupuesto";
			estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar[0])
		}

		else if (datos[i]["tipo_documento"] == "factura"){
			var tipo_factura = ".documentos_factura";
			estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar[0])
		}
		else if (datos[i]["tipo_documento"] == "albaran"){
			var tipo_factura = ".documentos_albaran";
			estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar[0])
		}
		else if (datos[i]["tipo_documento"] == "x"){
			var tipo_factura = ".documentos_x";
			estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar[0])
		}
		else if (datos[i]["tipo_documento"] == "y"){
			var tipo_factura = ".documentos_y";
			estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar[0])
		}
	}//cerramos el for
}

function estructuraDocumentos(tipo_factura, archivo, nombre_archivo_mostrar){

	var icono_visualizar = "<i class='fas fa-search-plus'></i>";
	var icono_editar = "<i class='fas fa-edit'></i>";
	var icono_descargar = "<i class='fas fa-arrow-alt-circle-down'></i>";

	var tipo_documento_v2 = tipo_factura.split('_').pop();

	$(tipo_factura).append(
		$("<tr>").append(
			$("<td style='width: 8%'>").append(
				$("<img src='/img/pdf.png' style='width: 35px'>")
			)
		).append(
			$("<td>").append(
				$("<label>").text(nombre_archivo_mostrar)
			)
		).append(
			$("<td>").append(
				$("<a class='btn btn-success agregar_documento' style='margin: 10px' data-toggle='modal' data-target='#modal_actualizar_fichero'>").attr("data-documento",tipo_documento_v2).attr("ruta_fichero",archivo).append(icono_editar+"\t Modificar")
			).append(
				$("<a class='btn btn-success' style='margin: 10px'>").append(icono_visualizar+"\t Visualizar").attr("href",archivo).attr("target","_blank")
			).append(
				$("<a class='btn btn-success' style='margin: 10px'>").append(icono_descargar+"\t Descargar").attr("href","/documento"+archivo)
			)
		)
	)
}