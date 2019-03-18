@extends('layouts.master')

@section('contenido')
	{{ Breadcrumbs::render('clientes') }}
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Clientes <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i>   Nuevo</button></h3>
			@include('../modal')
		</div>
	</div>
	<br>

	<form method="get" action="/" accept-charset="UTF-8">
		<div class="col-6 mb-5 " style="display: flex; width: 30%;">

			<input type="text" class="form-control" name="busqueda" placeholder="Busca" aria-label="Recipient's username" aria-describedby="basic-addon2">
				
			<button type="submit" class="btn btn-primary ml-1">Search</button>
		
		</div>
	</form>
 	
 	<div class="row">
 		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<table class="table" id="dtBasicExample">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Telefono</th>
			      <th scope="col">Localidad</th>
			      <th scope="col">NIF/CIF</th>
			      <th scope="col">Opciones</th>
			    </tr>
			  </thead>
			  <tbody class="tbody" id="ListClients">
				
			  </tbody>
			</table>
		 {!! $ListaClientes->links() !!}
		</div>
	</div>

	<script type="text/javascript">
		//una vez este todo cargado, llamara a los datos
		document.addEventListener('DOMContentLoaded', function(){
				datos_JSON = {!! json_encode($ListaClientes->toArray(), JSON_HEX_TAG) !!}['data'];
				listadoClientes(datos_JSON);
		});

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		
	</script>


			
@endsection



