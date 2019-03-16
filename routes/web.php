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

//se utiliza el "uses", "as" para definir la ruta del breadcrumb
Route::get('/',['uses' => 'ControladorClientes@getListadoClientes', 'as' => '/']);
Route::post('/','ControladorClientes@guardarCliente');

Route::get('/cliente/{id}', 'ControladorClientes@getDetalleClientes');
//el route name es para los breadcumbs al pasar un id
Route::name('detalle_cliente')->get('/detalle_cliente/{id}', 'ControladorClientes@getDetalleClientes');
Route::put('/cliente/{id}', 'ControladorClientes@guardarDatosEditadosCliente');
Route::post('/cliente/{id}', 'ControladorVentas@nuevaVenta');

Route::get('/cliente/venta/{id}/{idcliente}', 'ControladorVentas@getDetalleVenta');
//el route name es para los breadcumbs al pasar un id
Route::name('detalle_venta')->get('/detalle_venta/{id}', 'ControladorVentas@getDetalleVenta');
Route::put('/cliente/venta/{id}/{idcliente}', 'ControladorVentas@guardarDatosEditadosVenta');
Route::post('/cliente/venta/{id}/{idcliente}', 'ControladorVentas@SubirFichero');
Route::patch('/cliente/venta/{id}/{idcliente}', 'ControladorVentas@actualizarFichero');

Route::get('/documento/storage/{fichero}' , 'ControladorVentas@descargarFichero');
