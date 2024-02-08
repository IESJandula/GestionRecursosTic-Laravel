<?php

use Illuminate\Support\Facades\Route;
use App\Models\Dispositivo;
use App\Http\Controllers\DispositivoController;


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
    Route::get('/dispositivos/filtrar-por-ubicacion', [DispositivoController::class, 'filtrarPorUbicacion'])->name('filtrar_por_ubicacion');
    
    /*Apartado de listar, modificar, añadir y eliminar dispositivo*/
    Route::get('/stock', 'listar');
    Route::get('/nuevo-dispositivo', 'addDispositivos');
    Route::post('/addNew', 'insertDispositivos');
});


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



