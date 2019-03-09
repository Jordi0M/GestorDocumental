@extends('layouts.master')

@section('contenido')
	
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3 id="nombre_cliente"><button class="btn btn-success" id="boton_editar_cliente">Editar</button></h3>
			</div>
		</div>
		<br>
		<!--
		<div class="col-6 mb-5 " style="display: flex; width: 30%;">
			
				<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
				
				<button type="button" class="btn btn-primary ml-1">Search</button>
			
		</div>
		-->
	<div class="row">
		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<form method="POST" id="formulario_detalle_clientes">
		            {{ csrf_field() }}
				<table class="table">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">Nombre</th>
				      <th scope="col">DNI/NIF</th>
				      <th scope="col">Telefono</th>
				      <th scope="col">Mail</th>
				    </tr>
				  </thead>
				  <tbody class="detalles_cliente1">
				  </tbody>
				</table>

				<table class="table">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">Dirección</th>
				      <th scope="col">Provincia</th>
				      <th scope="col">Localidad</th>
				      <th scope="col">CP</th>
				    </tr>
				  </thead>
				  <tbody class="detalles_cliente2">
				  </tbody>
				</table>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h3>Ventas Asociadas <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Nueva venta</button></h3>
		</div>
	</div>

	<div class="row">
 		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Descripcion</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Fecha</th>
			    </tr>
			  </thead>
			  <tbody class="tbody">
			  </tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
		//una vez este todo cargado, llamara a los datos
		document.addEventListener('DOMContentLoaded', function(){
		    llamar_Datos();
		    $( "#boton_editar_cliente" ).on( "click", editarDatosCliente ); //le asignamos el onclick de editar datos
		    $("#formulario_detalle_clientes").attr("action","/detalle/"+datos_JSON[0]["id"]);
		    //ponemos bien el ID del formulario para el action
		});

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		function llamar_Datos(){
			recoger_Datos();
			detalleCliente(datos_JSON);
		}
	</script>
@endsection