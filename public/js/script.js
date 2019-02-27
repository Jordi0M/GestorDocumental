function listadoClientes(datosJSON){
	
	//php recoge los datos, y los guardamos en una variable de javascript
	//var datos = $("#datos")[0].innerHTML;
	var datos = datosJSON;
	//console.log(datos);
	var enlace_nombre_cliente = "<a href='#' class='nombre_cliente'>";
	var boton_detalle_cliente = "<button type='button' class='btn btn-success'>";
	var icono_detalle_cliente = "<i class='fas fa-search-plus'>";
	var boton_eliminar_cliente = "<button type='button' class='btn btn-danger'>";
	var icono_papelera = "<i class='fas fa-trash'>";


	for (var i = 0; i<datos.length; i++) {
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
				$("<td>").append(//en este "td" meteremos todos los botones
					$(boton_detalle_cliente).append(//dentro del boton meteremos un icono y texto
					$(icono_detalle_cliente).text("Detalles"))
				).append(//y aqui el siguiente boton en el mismo "td"
					$(boton_eliminar_cliente).append(
					$(icono_papelera).text("Eliminar"))
					)
				)
		);
	}
}