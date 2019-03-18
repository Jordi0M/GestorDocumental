@extends('layouts.master')

@section('contenido')
	{{ Breadcrumbs::render('detalle_venta', $ListaCliente[0], $ListaVentas[0]) }}
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 id="nombre_cliente"><button class="btn btn-success" id="boton_editar_datos"><i class="fas fa-edit"></i>   Editar</button></h3>
		</div>
	</div>
		<br>
	<div class="row">
		<div class="col" style="margin-left: 50px; margin-right: 50px;">
			<form method="POST" id="formulario_de_editar">
				{{ method_field('PUT') }}
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

	@include('../modals/modal_nuevo_fichero')
	@include('../modals/modal_actualizar_fichero')
	<div class="row">
		<div class="col-xs-12" id="div_documento_presupuesto">
			<h3>Presupuesto	<button class="btn btn-success agregar_documento" data-toggle="modal" data-target="#myModal" data-documento="presupuesto"><i class="fas fa-folder-plus"></i>   Añadir Presupuesto</button></h3>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre Del Fichero</th>
					</tr>
				</thead>
				<tbody class="documentos_presupuesto"></tbody>
			</table>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-xs-12" id="div_documento_factura">
			<h3>Factura	<button class="btn btn-success agregar_documento" data-toggle="modal" data-target="#myModal" data-documento="factura"><i class="fas fa-folder-plus"></i>   Añadir Factura</button></h3>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre Del Fichero</th>
					</tr>
				</thead>
				<tbody class="documentos_factura"></tbody>
			</table>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12" id="div_documento_albaran">
			<h3>Albaran	<button class="btn btn-success agregar_documento" data-toggle="modal" data-target="#myModal" data-documento="albaran"><i class="fas fa-folder-plus"></i>   Añadir Albaran</button></h3>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre Del Fichero</th>
					</tr>
				</thead>
				<tbody class="documentos_albaran"></tbody>
			</table>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12" id="div_documento_x">
			<h3>Documento X	<button class="btn btn-success agregar_documento" data-toggle="modal" data-target="#myModal" data-documento="x"><i class="fas fa-folder-plus"></i>   Añadir documento X</button></h3>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre Del Fichero</th>
					</tr>
				</thead>
				<tbody class="documentos_x"></tbody>
			</table>
		</div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-xs-12" id="div_documento_y">
			<h3>Documento Y	<button class="btn btn-success agregar_documento" data-toggle="modal" data-target="#myModal" data-documento="y"><i class="fas fa-folder-plus"></i>   Añadir documento Y</button></h3>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre Del Fichero</th>
					</tr>
				</thead>
				<tbody class="documentos_y"></tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
		//una vez este todo cargado, llamara a los datos
		document.addEventListener('DOMContentLoaded', function(){
		    llamar_Datos();
			indicarTipoDeDocumentoAlModal();

			$("#boton_guardar_cambios_nuevo_fichero").on("click", comprobarSiEsPDF)
			$("#boton_guardar_cambios_actualizar_fichero").on("click", comprobarSiEsPDFv2)	  
		});

		function darOnclick_y_action_detalle_ventas(datos_JSON_ventas, datos_JSON_clientes){
		    $( "#boton_editar_datos" ).on( "click", editarDatos ); //le asignamos el onclick de editar datos
		    $("#formulario_de_editar").attr("action","/cliente/venta/"+datos_JSON_ventas[0]["id"]+"/"+datos_JSON_clientes[0]["id"]);
		    //ponemos bien el ID del formulario de editar para el action
		    $("#form_modal_nuevo_fichero").attr("action","/cliente/venta/"+datos_JSON_ventas[0]["id"]+"/"+datos_JSON_clientes[0]["id"]);
		    //ponemos bien el ID del formulario de añadir para el action

		    $("#form_modal_actualizar_fichero").attr("action","/cliente/venta/"+datos_JSON_ventas[0]["id"]+"/"+datos_JSON_clientes[0]["id"]);
		    //ponemos bien el ID del formulario de añadir para el action

		    $("#click_cerrar_nuevo_fichero").on("click", function(){
		    	cerrarModalNuevoFichero(datos_JSON_ventas[0]["id"],datos_JSON_clientes[0]["id"])
		    	//para cerrar y recargar bien la pagina
		    });
		    
		    $("#click_cerrar_actualizar_fichero").on("click", function(){
		    	cerrarModalNuevoFichero(datos_JSON_ventas[0]["id"],datos_JSON_clientes[0]["id"])
		    	//para cerrar y recargar bien la pagina
		    })
		}

		/*
		con este script, llamaremos a la funcion que recoge datos (que esta en master),
		y los usaremos para crear la vista correspondiente (listado ventas)
		*/
		function llamar_Datos(){
			var datos = '{{$ListaVentas}}';
			recoger_Datos(datos);
			var datos_JSON_ventas = datos_JSON;

			var datos = '{{$ListaCliente}}';
			recoger_Datos(datos);
			var datos_JSON_clientes = datos_JSON;

			detalleVenta(datos_JSON_ventas, datos_JSON_clientes);
			darOnclick_y_action_detalle_ventas(datos_JSON_ventas, datos_JSON_clientes);

			var datos_documentos = '{{$ListaDocumentos}}';
			recoger_Datos(datos_documentos);
			listadoDocumentos(datos_JSON);

			
		}
	</script>
@endsection