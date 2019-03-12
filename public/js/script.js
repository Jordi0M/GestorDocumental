function listadoClientes(datosJSON){
	
	//php recoge los datos, y los guardamos en una variable de javascript
	var datos = datosJSON;
	var enlace_nombre_cliente = "<a class='nombre_cliente'>";
	var icono_detalle_cliente = "<i class='fas fa-search-plus'>";

	for (var i = 0; i<datos.length; i++) {
		//declaramos primero el onclick del boton
		var onclick = "onclick=redirigir_a_DetalleClientes("+datos[i]["id"]+")";	

		//creamos el boton segun el dato que crea el for
		var boton_detalle_cliente = "<button type='button' class='btn btn-success'"+onclick+">";
		$(".tbody").append(//todo esto se añadira al tbody
			$("<tr>").append(//creamos un tr y añadiremos el contenido
				$("<th scope=row>").append(//comenzamos a añadir a los "td" tanto texto como botones
				$(enlace_nombre_cliente).text(datos[i]["nombre"])
				)).append(
				$("<td>").text(datos[i]["telefono"])
				).append(
				$("<td>").text(datos[i]["direccion"])
				).append(
				$("<td>").text(datos[i]["provincia"])
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
	var nombre = $("<input type=text value="+datos["nombre"]+" class=datos_detalle name=nombre disabled/>");
	var documento = $("<input type=text value="+datos["documento"]+" class=datos_detalle name=documento disabled/>");
	var telefono = $("<input type=text value="+datos["telefono"]+" class=datos_detalle name=telefono disabled/>");
	var mail = $("<input type=label value="+datos["mail"]+" class=datos_detalle name=mail disabled/>");
	var direccion = $("<input type=label value="+datos["direccion"]+" class=datos_detalle name=direccion disabled/>");
	var provincia = $("<input type=label value="+datos["provincia"]+" class=datos_detalle name=provincia disabled/>");
	var localidad = $("<input type=label value="+datos["localidad"]+" class=datos_detalle name=localidad disabled/>");
	var cp = $("<input type=label value="+datos["cp"]+" class=datos_detalle name=cp disabled/>");

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

function detalleVenta(datosJSON){
	//como en el array que recibe, solo es de una venta propia, le daremos la primera posicon (0)
	var datos = datosJSON[0];
	if (datos["estado"] == 1){
		var estado_venta = "vendido";
	}
	else if (datos["estado"] == 0) {
		var estado_venta = "'sin vender'";
	}
	//datos de la venta
	var descripcion = $("<input type=text value="+datos["descripcion"]+" class=datos_detalle name=descripcion disabled/>");

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
	
	var fecha_modificacion = $("<input type=text value="+datos["updated_at"]+" name=fecha_modificacion readonly/>");
	var fecha_modificacion = $("<label>").text(datos["updated_at"]);
	//$("#nombre_cliente").prepend("Cliente: "+datos["nombre"]+"\t");

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
		var onclick = "onclick=redirigir_a_DetalleVentas("+datos[i]["id"]+")";
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

function redirigir_a_DetalleVentas(id){

	window.location='/cliente/venta/'+id;
}

function comprobarSiEsPDF(){
    var doc = $("#subida_documento").val();
    var extension = doc.split('.').pop();
    if (extension == "pdf") {
    	$("#form_modal_nuevo_fichero").submit();
    }
    else{
    	alert("mal");
    }
}


//se utilizara para saber que tipo de documento va a saber
function indicarTipoDeDocumentoAlModal(){
	$(".agregar_documento").on("click", function(){
	var tipo_de_documento = $(this).data("documento");
	$("#label_tipo_de_documento").text(tipo_de_documento);
	$("#input_tipo_de_documento").val(tipo_de_documento);
	});
}

function listadoDocumentos(datosJSON){
	
	var datos = datosJSON;

	for (var i = 0; i<datos.length; i++) {

		var archivo = datos[i]["archivo"].replace("public", "/storage");
		//reemplazamos la carpeta "public" por "storage"
		var nombre_archivo_mostrar = archivo.replace("/storage/","")
		//mostraremos el archivo sin storage

		//y segun el tipo de documento, lo añadimos en algun div u otro:
		if (datos[i]["tipo_documento"] == "presupuesto"){
			$("#div_documento_presupuesto").append(
				$(".documentos_presupuesto").append(
					$("<tr>").append(
						$("<td>").append(
							$("<a>").attr("href",archivo).text(archivo)
						)
					)
				)
			)
		}
		else if (datos[i]["tipo_documento"] == "factura"){
			$("#div_documento_factura").append(
				$(".documentos_factura").append(
					$("<tr>").append(
						$("<td>").append(
							$("<a>").attr("href",archivo).text(nombre_archivo_mostrar)
						)
					)
				)
			)
		}
		else if (datos[i]["tipo_documento"] == "albaran"){
			$("#div_documento_albaran").append(
				$(".documentos_albaran").append(
					$("<tr>").append(
						$("<td>").append(
							$("<a>").attr("href",archivo).text(nombre_archivo_mostrar)
						)
					)
				)
			)
		}
		else if (datos[i]["tipo_documento"] == "x"){
			$("#div_documento_x").append(
				$(".documentos_x").append(
					$("<tr>").append(
						$("<td>").append(
							$("<a>").attr("href",archivo).text(nombre_archivo_mostrar)
						)
					)
				)
			)
		}
		else if (datos[i]["tipo_documento"] == "y"){
			$("#div_documento_y").append(
				$(".documentos_y").append(
					$("<tr>").append(
						$("<td>").append(
							$("<a>").attr("href",archivo).text(nombre_archivo_mostrar)
						)
					)
				)
			)
		}
	}//cerramos el for
}