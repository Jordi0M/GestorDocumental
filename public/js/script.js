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
		var id_cliente = datos[i]["id"];
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
						$(icono_detalle_cliente).text("Detalle")).on(
						//añadimos la ruta de redirigir
						"click", function(){
							//le pasamos el id del cliente para redirigir a su informacion
							window.location='/detalle/'+id_cliente;
						})
					)//cerramos el div
					)//cerramos el td
				)//cerramos el tr
		);//cerramos el tbody
	}//cerramos el for
}