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

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});