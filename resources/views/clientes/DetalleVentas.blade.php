@extends('layouts.master')

@section('contenido')
	<div class="row">
		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<form method="POST" id="formulario_detalle_clientes">
		            {{ csrf_field() }}
				<table class="table">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">Descripcion</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Ultima Fecha</th>
				    </tr>
				  </thead>
				  <tbody class="detalles_venta">
				  </tbody>
				</table>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Presupuesto	<button class="btn btn-success">Añadir Presupuesto</button></h3>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Factura	<button class="btn btn-success">Añadir Factura</button></h3>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12">
			<h3>Albaran	<button class="btn btn-success">Añadir Albaran</button></h3>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12">
			<h3>Algo mas	<button class="btn btn-success">Añadir documento</button></h3>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12">
			<h3>Algo mas	<button class="btn btn-success">Añadir documento</button></h3>
		</div>
	</div>
	

<script type="text/javascript">
		//una vez este todo cargado, llamara a los datos
		document.addEventListener('DOMContentLoaded', function(){
		    llamar_Datos();
		    //ponemos bien el ID del formulario para el action
		});

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		function llamar_Datos(){
			var datos = '{{$ListaVentas}}';
			recoger_Datos(datos);
			detalleVenta(datos_JSON);
		}
	</script>
@endsection