
function datos(){
	
	//php recoge los datos, y los guardamos en una variable de javascript
	var datos = $("#datos")[0].innerHTML;
	//lo transformamos en JSON para poder trabajar con ellos
	var datos = JSON.parse(datos);
	//console.log(datos);

	for (var i = 0; i<datos.length; i++) {
		$(".tbody").append(
			$("<tr>").append(
				$("<td>").append(
				$("<a href='#' class='nombre_cliente'>").text(datos[i]["nombre"])
				)).append(
				$("<td>").text(datos[i]["documento"])
				).append(
				$("<td>").text(datos[i]["telefono"])
				).append(
				$("<td>").append(
					$("<button type='button' class='btn btn-info'>")
				.append(
					$("<i class='fas fa-search-plus'>").text("Detalles"))
				).append($("<button type='button' class='btn btn-danger'>")
				.append(
					$("<i class='fas fa-trash'>").text("Eliminar"))
				)
				)
			);

	}

	
}