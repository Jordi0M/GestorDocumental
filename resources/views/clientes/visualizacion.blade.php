<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	@extends('links')

	@section('content')

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>prueba</th>
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
						<a href="">{{$clientes->nombre}}</a>
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
	@stop

</body>
</html>