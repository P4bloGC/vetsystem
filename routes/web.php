<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin/activo/cambiar', 'App\Http\Controllers\MainController@activo');
Route::post('/admin/agregar-documento', 'App\Http\Controllers\MainController@agregarDocumento');

Route::post('/admin/especies/razas', 'App\Http\Controllers\AdminEspeciesController@razasForm');
Route::post('/admin/especies/razas/ingresar', 'App\Http\Controllers\AdminEspeciesController@ingresarRaza');

Route::post('/admin/clientes/mascota', 'App\Http\Controllers\AdminClientesController@detalleMascota');
Route::post('/admin/clientes/mascota/historial', 'App\Http\Controllers\AdminClientesController@historialClinico');
Route::post('/admin/clientes/mascota/historial/agregar', 'App\Http\Controllers\AdminClientesController@agregarHistorialClinico')->name('agregarHistorialClinico');
Route::post('/admin/clientes/mascota/historial/editar', 'App\Http\Controllers\AdminClientesController@editarHistorialClinico')->name('editarHistorialClinico');
Route::post('/admin/clientes/editar-form', 'App\Http\Controllers\AdminClientesController@editarForm');
Route::post('/admin/clientes/mascota/planificacion', 'App\Http\Controllers\AdminClientesController@planificacion');
Route::post('/admin/clientes/mascota/planificacion/agregar', 'App\Http\Controllers\AdminClientesController@agregarPlanificacion')->name('agregarPlanificacion');
Route::post('/admin/clientes/mascota/planificacion/eliminar', 'App\Http\Controllers\AdminClientesController@eliminarPlanificacion');
Route::post('/admin/clientes/mascota/planificacion/estado', 'App\Http\Controllers\AdminClientesController@estadoPlanificacion');
Route::post('/admin/clientes/mascota/documentos', 'App\Http\Controllers\AdminClientesController@documentosMascota');
Route::get('/admin/clientes/mascota/historial-form/{id_mascota}', 'App\Http\Controllers\AdminClientesController@historialClinicoForm');
Route::post('/admin/clientes/mascota/eliminar-historia', 'App\Http\Controllers\AdminClientesController@eliminarHistoria');
Route::get('/admin/clientes/mascota/documento-form/{id_mascota}/{id_tipo_documento}/{decripcion}', 'App\Http\Controllers\AdminClientesController@documentoForm');
Route::get('/admin/clientes/mascota/editar-historial-form/{id_mascota}/{id}', 'App\Http\Controllers\AdminClientesController@editarHistorialClinicoForm');
Route::post('/admin/subir-imagen', 'App\Http\Controllers\AdminClientesController@subirImagen');

Route::post('/admin/ventas/agregar-articulo', 'App\Http\Controllers\AdminVentasController@agregarArticulo');
Route::post('/admin/ventas/agregar-detalle', 'App\Http\Controllers\AdminVentasController@agregarDetalle');
Route::get('/admin/ventas/anular/{id}', 'App\Http\Controllers\AdminVentasController@anularVenta');

Route::post('/admin/compras/buscar-articulos', 'App\Http\Controllers\AdminComprasController@buscarArticulos');
Route::post('/admin/compras/agregar-detalle', 'App\Http\Controllers\AdminComprasController@agregarDetalle');

Route::get('/admin/citas', 'App\Http\Controllers\CitasController@index')->name('citas');
Route::post('/admin/citas/agregar', 'App\Http\Controllers\CitasController@agregarCita')->name('agregar-cita');
Route::post('/admin/citas/buscar', 'App\Http\Controllers\CitasController@buscarCitas');
Route::post('/admin/citas/agenda-funcionario', 'App\Http\Controllers\CitasController@agendaFuncionario');
Route::post('/admin/citas/ver', 'App\Http\Controllers\CitasController@verCita');
Route::get('/admin/citas/ver/eliminar/{id}', 'App\Http\Controllers\CitasController@eliminarCita');
Route::post('/admin/citas/buscar-mascota', 'App\Http\Controllers\CitasController@buscarMascotas');
