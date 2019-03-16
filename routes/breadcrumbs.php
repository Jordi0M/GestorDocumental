<?php

// Vista Clientes
Breadcrumbs::for('clientes', function ($trail) {
    $trail->push('clientes', route('/'));
});

// Detalle Cliente
Breadcrumbs::for('detalle_cliente', function ($trail, $detalle_cliente) {
	$trail->parent('clientes');
    $trail->push($detalle_cliente->nombre, route('detalle_cliente', $detalle_cliente->id));
});

// Detalle Ventas
Breadcrumbs::for('detalle_venta', function ($trail, $detalle_cliente, $detalle_venta) {
	$trail->parent('detalle_cliente', $detalle_cliente);
    $trail->push($detalle_venta->descripcion, route('detalle_venta', $detalle_venta->id, $detalle_venta->id_cliente));
});