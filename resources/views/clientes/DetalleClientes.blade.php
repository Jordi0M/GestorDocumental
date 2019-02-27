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
<!--Futura tabla
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
-->
@endsection