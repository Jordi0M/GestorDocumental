@extends('layouts.master')

@section('contenido')
	{{ Breadcrumbs::render('detalle_cliente', $ListaClientes[0]) }}	
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3 id="nombre_cliente"><button class="btn btn-success" id="boton_editar_datos"><i class="fas fa-edit"></i>  Editar</button></h3>
			</div>
		</div>
		<br>
		@if ($errors->any())
					<div class="alert alert-danger">
							<ul>
									@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
									@endforeach
							</ul>
					</div>
			@endif
		
	<div class="row">
		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<form method="POST" id="formulario_de_editar">
				{{ method_field('PUT') }}
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

	<br><br>

	<form method="get" id="busqueda_detalle_cliente" accept-charset="UTF-8">
		<div class="col-6 mb-5 " style="display: flex; width: 30%;">
			
			<input type="text" class="form-control" name="busqueda" placeholder="Busca" aria-label="Recipient's username" aria-describedby="basic-addon2">
				
			<button type="submit" class="btn btn-primary ml-1">Search</button>
		
		</div>
	</form>

	<br>
	<div class="row">
		<div class="col-xs-12">
			<h3>Ventas Asociadas <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i>   Nueva venta</button></h3>
			@include('../modals/modal_nueva_venta')
		</div>
	</div>
	<br><br>
	<div class="row">
 		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Descripcion</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Opciones</th>
			    </tr>
			  </thead>
			  <tbody class="lista_ventas">
			  </tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
		//una vez este todo cargado, llamara a los datos
		document.addEventListener('DOMContentLoaded', function(){
		    llamar_Datos();
		});

		function darOnclick_y_action_detalle_clientes(datos_JSON){
			$( "#boton_editar_datos" ).on( "click", editarDatos ); //le asignamos el onclick de editar datos
		    $("#formulario_de_editar").attr("action","/cliente/"+datos_JSON[0]["id"]);
		    $("#form_modal_nueva_venta").attr("action","/cliente/"+datos_JSON[0]["id"]);
		    $("#busqueda_detalle_cliente").attr("action","/cliente/"+datos_JSON[0]["id"]);
		    //ponemos bien el ID del formulario para el action
		}

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		function llamar_Datos(){
			var datos = '{{$ListaClientes}}';
			recoger_Datos(datos);
			detalleCliente(datos_JSON);
			darOnclick_y_action_detalle_clientes(datos_JSON);

			var datos_ventas = '{{$ListaVentas}}';
			recoger_Datos(datos_ventas);
			listadoVentas(datos_JSON);

		}
	</script>
@endsection