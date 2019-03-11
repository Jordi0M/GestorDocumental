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

Route::get('/cliente/{id}', 'ControladorClientes@getDetalleClientes');
Route::put('/cliente/{id}', 'ControladorClientes@guardarDatosEditadosCliente');
Route::post('/cliente/{id}', 'ControladorVentas@nuevaVenta');

Route::get('/cliente/venta/{id}', 'ControladorVentas@getDetalleVenta');
Route::put('/cliente/venta/{id}', 'ControladorVentas@guardarDatosEditadosVenta');
Route::post('/cliente/venta/{id}', 'ControladorVentas@SubirFichero');
