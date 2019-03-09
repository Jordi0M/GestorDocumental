@extends('layouts.master')

@section('contenido')
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
		    $( "#boton_editar_cliente" ).on( "click", editarDatosCliente ); //le asignamos el onclick de editar datos
		    $("#formulario_detalle_clientes").attr("action","/cliente/"+datos_JSON[0]["id"]);
		    //ponemos bien el ID del formulario para el action
		});

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		function llamar_Datos(){
			var datos = '{{$ListaClientes}}';
			recoger_Datos(datos);
			detalleCliente(datos_JSON);

			var datos_ventas = '{{$ListaVentas}}';
			recoger_Datos(datos_ventas);
			listadoVentas(datos_JSON);

		}
	</script>
@endsection