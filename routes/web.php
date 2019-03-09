<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::get('/visualizacionclientes', 'ControladorClientes@getListadoClientes');

Route::get('/', 'ControladorClientes@getListadoClientes');
Route::post('/','ControladorClientes@guardarCliente');
//Route::get('/detalle', 'ControladorClientes@getDetalleClientes');
Route::get('/cliente/{id}', 'ControladorClientes@getDetalleClientes');
Route::post('/cliente/{id}', 'ControladorClientes@guardarDatosEditadosCliente');

Route::get('/cliente/venta/{id}', 'ControladorVentas@getDetalleVenta');
