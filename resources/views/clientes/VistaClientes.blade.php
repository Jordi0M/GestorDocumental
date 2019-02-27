@extends('layouts.master')

@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Clientes <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo</button></h3>
			@include('../modal')
		</div>
	</div>
	<div class="col-6 mb-5 " style="display: flex; width: 30%;">
		
			<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
			
			<button type="button" class="btn btn-primary ml-1">Search</button>
		
	</div>
 
		<table class="table">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">Nombre</th>
		      <th scope="col">Telefono</th>
		      <th scope="col">Dirección</th>
		      <th scope="col">Provincia</th>
		      <th scope="col">Opciones</th>
		    </tr>
		  </thead>
		  <tbody class="tbody">

		  	@foreach ($ListaClientes as $cliente)
	    	
		
		    <tr>
		      <th scope="row">{{ $cliente->nombre}}</th>
		      <td>{{$cliente->telefono}}</td>
		      <td>{{ $cliente->direccion }}</td>
		      <td>{{ $cliente->provincia}}</td>
		      <td>
		      	<div style="width: 40%;">
		      		<button type="button" class="btn btn-success">Detalle</button>

		      		<button type="button" class="btn btn-danger">Eliminar</button>

		      	</div>
		      </td>
		    </tr>
		    
		    @endforeach
		  </tbody>
		</table>
		
	</div>

	<button onclick="llamar_Datos()">pruebas</button>

	<script type="text/javascript">
		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado clientes)
		*/
		function llamar_Datos(){
			recoger_Datos();
			listadoClientes(datos_JSON);
		}
	</script>


			
@endsection



