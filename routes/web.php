<?php

use Illuminate\Support\Facades\Route;
use App\Models\Dispositivo;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\IncidenciasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


//grupo de rutas que dirigen a DispositivoController
Route::controller(DispositivoController::class)->group(function () {
    Route::get('/dispositivos', 'list');
    Route::get('/dispositivos-averiados', 'listarAveriados')->name('listarAveriados');
    Route::get('/reparar/{id}', 'reparar')->name('reparar');
    Route::get('/desechar/{id}', 'desechar')->name('desechar');
    Route::get('/filtrar-por-tipo', 'filtrarPorTipo')->name('filtrar-por-tipo');
    Route::get('/asignar-ubicacion', 'listarDispositivosUbicados')->name('asignar-ubicacion');
    Route::get('/asignar-ubicacion-nueva', 'asignarUbicacion')->name('asignar-ubicacion-nueva');
    
    /*Apartado de listar, modificar, añadir y eliminar dispositivo*/
    Route::get('/stock', 'listar');
    Route::get('/nuevo-dispositivo', 'addDispositivos');
    Route::post('/addNew', 'insertDispositivos');
    Route::get('/modificar-dispositivo/{id}', 'editarDispositivos');
    Route::post('/updateDispositivoStock/{id}', 'updateDispositivos');
    Route::get('/eliminar-dispositivo/{id}', 'eliminarDispositivo');

});
Route::get('/dispositivos/filtrar-por-ubicacion', [DispositivoController::class, 'filtrarPorUbicacion'])->name('filtrar_por_ubicacion');


/* RUTAS PARA TIPO DE DISPOSITIVO */
Route::get('/mostrar-tipos-dispositivos', [DispositivoController::class, 'mostrarTiposDispositivos'])
    ->name('mostrar.tipos.dispositivos');


Route::post('/agregar-equipo', [DispositivoController::class, 'agregarEquipo'])
    ->name('agregar.equipo');


Route::delete('/eliminar-tipos-dispositivos', [DispositivoController::class, 'eliminarTiposDispositivos'])
    ->name('eliminar.tipos.dispositivos');

Route::post('/editar-equipo', [DispositivoController::class, 'editarEquipo'])->name('editar.equipo');

Route::post('/guardar-cambios', [DispositivoController::class, 'guardarCambios'])
    ->name('guardar.cambios');


/* Ruta para metodo ubicaciones*/
Route::get('/ubicaciones', [DispositivoController::class, 'ubicaciones'])->name('dispositivos.ubicaciones');
Route::get('/ubicaciones/{ubicacion}/edit', [DispositivoController::class, 'edit'])->name('ubicaciones.edit');
Route::delete('/ubicaciones/{ubicacion}', [DispositivoController::class, 'destroy'])->name('ubicaciones.destroy');
Route::post('/crearUbicacion', [DispositivoController::class, 'crearUbicacion']);


/*Parte para el controlador de Incidencias*/
Route::controller(IncidenciasController::class)->group(function () {
    Route::get('/incidencias', 'list');

});
/*Fin controlador de incidencias*/