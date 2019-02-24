<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	@extends('layouts.master')

	@section('content')

	<p id="datos" hidden>{{$arrayClientes}}</p> 
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th colspan="4" style="text-align: center">Clientes</th>
				</tr>
				<tr>
					<th>Nombre</th>
					<th>CIF/NIF</th>
					<th>Telefono</th>
					<th>Botones</th>
				</tr>
			</thead>
			<tbody>
	@foreach( $arrayClientes as $clientes)
				<tr>
					<td>
						<a href="" class="nombre_cliente">{{$clientes->nombre}}</a>
					</td>
					<td>
						{{$clientes->documento}}
					</td>
					<td>
						{{$clientes->telefono}}
					</td>
					<td>
						<button type="button" class="btn btn-info">
							<i class="fas fa-search-plus"></i> Detalles
						</button>
						<button type="button" class="btn btn-danger">
							<i class="fas fa-trash"></i> Eliminar
						</button>
					</td>
				</tr>
	@endforeach
			</tbody>
		</table>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th colspan="4" style="text-align: center">Clientes</th>
				</tr>
				<tr>
					<th>Nombre</th>
					<th>CIF/NIF</th>
					<th>Telefono</th>
					<th>Botones</th>
				</tr>
			</thead>
			<tbody class="tbody">
				
			</tbody>
		</table>
	@stop
	<button onclick="datos()">dale</button>

</body>
</html>