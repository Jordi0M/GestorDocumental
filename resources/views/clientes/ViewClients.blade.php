@extends('layouts.master')

@section('content')
	<div class="row mt-5">
	<div class="d-inline p-2 "style="width:100%;">
		<div style="display:flex;">	
			<div>
				<h3>Listado de Clientes</h3>
			</div>
				<div>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

					<button type="button" class="btn btn-primary">Nuevo</button>
					<button type="button" class="btn btn-warning">Warning</button>
				</div>
	</div>
			<div class="col-6 mb-5" style="display: flex;">
				
					<input type="text" class="form-control" placeholder="First name">
					
					<button type="button" class="btn btn-primary ml-1">Search</button>
				</div>
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
		  <tbody>

		  	@foreach ($ListClients as $user)
	    	
		
		    <tr>
		      <th scope="row">{{ $user->nombre}}</th>
		      <td>{{$user->telefono}}</td>
		      <td>{{ $user->direccion }}</td>
		      <td>{{ $user->provincia}}</td>
		      <td>
		      	<div style="width: 40%;">
		      		<button type="button" class="btn btn-success">Success</button>

		      		<button type="button" class="btn btn-danger">Danger</button>

		      	</div>
		      </td>
		    </tr>
		    
		    @endforeach
		  </tbody>
		</table>
		
	</div>

@include('../modal')

    
@endsection



