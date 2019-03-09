function listadoClientes(datosJSON){
	
	//php recoge los datos, y los guardamos en una variable de javascript
	var datos = datosJSON;
	var enlace_nombre_cliente = "<a class='nombre_cliente'>";
	var icono_detalle_cliente = "<i class='fas fa-search-plus'>";

	for (var i = 0; i<datos.length; i++) {
		//declaramos primero el onclick del boton
		var onclick = "onclick=redirigir_a_DetalleClientes("+datos[i]["id"]+")"

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

	window.location='/detalle/'+id;
}

function detalleCliente(datosJSON){
	//como en el array que recibe, solo es de un cliente propio, le daremos la primera posicon (0)
	var datos = datosJSON[0];

	//datos del cliente
	var nombre = $("<input type=text value="+datos["nombre"]+" class=datos_cliente name=nombre readonly/>");
	var documento = $("<input type=text value="+datos["documento"]+" class=datos_cliente name=documento readonly/>");
	var telefono = $("<input type=text value="+datos["telefono"]+" class=datos_cliente name=telefono readonly/>");
	var mail = $("<input type=label value="+datos["mail"]+" class=datos_cliente name=mail readonly/>");
	var direccion = $("<input type=label value="+datos["direccion"]+" class=datos_cliente name=direccion readonly/>");
	var provincia = $("<input type=label value="+datos["provincia"]+" class=datos_cliente name=provincia readonly/>");
	var localidad = $("<input type=label value="+datos["localidad"]+" class=datos_cliente name=localidad readonly/>");
	var cp = $("<input type=label value="+datos["cp"]+" class=datos_cliente name=cp readonly/>");

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

function editarDatosCliente (){
	$(".datos_cliente").attr("readonly",false);//se quitara el readonly
	$(".datos_cliente").hover(function(){
		$(this).css("background-color","rgba(0,255,0,0.3)");//con esto se volvera verde al pasar por encima
		},
		function() {
	    	$(this).css('background-color', 'rgba(128, 255, 255, 0)');//con esto cuando quites el raton, estara blanco otra vez el fondo
	  	}
	)
	reemplazarBotonEditarCliente();
}

function reemplazarBotonEditarCliente (){
	$("#boton_editar_cliente").text("Guardar")
	$( "#boton_editar_cliente" ).on( "click",  guardarDatosEditados );
}

function guardarDatosEditados(){
	$("#formulario_detalle_clientes").submit();
}