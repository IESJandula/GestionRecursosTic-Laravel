<?php

use App\Models\Dispositivo;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\UbicacionesController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
    Route::get('/ver-equipos-desechados', 'listarDesechados')->name('ver-equipos-desechados');

    
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


/* Rutas para metodo ubicaciones*/
Route::get('/ubicaciones', [UbicacionesController::class, 'ubicaciones'])->name('dispositivos.ubicaciones');

Route::get('/ubicaciones/{ubicacion}/edit', [UbicacionesController::class, 'edit'])->name('ubicaciones.edit');

Route::delete('/ubicaciones/{ubicacion}', [UbicacionesController::class, 'destroy'])->name('ubicaciones.destroy');

Route::post('/crearUbicacion', [UbicacionesController::class, 'crearUbicacion']);

Route::get('ubicaciones/{id}/edit', [UbicacionesController::class, 'edit'])->name('ubicaciones.edit');

Route::put('ubicaciones/{id}', [UbicacionesController::class, 'update'])->name('ubicaciones.update');

Route::post('/filtrarPorUbicacion', [UbicacionesController::class, 'filtrarPorUbicacion'])->name('ubicaciones.filtrarPorUbicacion');

// Ruta para eliminar una ubicación
Route::delete('ubicaciones/{id}', [UbicacionesController::class, 'destroy'])->name('ubicaciones.destroy');


/*Parte para el controlador de Incidencias*/
Route::get('/mantenimientos', [IncidenciasController::class, 'list'])->name('mantenimientos.list');

Route::post('/mantenimientos', [IncidenciasController::class, 'store'])->name('mantenimientos.store');

Route::get('mantenimientos/{id}/edit', [IncidenciasController::class, 'edit'])->name('mantenimientos.edit');
Route::put('mantenimientos/{id}', [IncidenciasController::class, 'update'])->name('mantenimientos.update');


Route::delete('/mantenimientos/{id}', [IncidenciasController::class, 'destroy'])->name('mantenimientos.destroy');

/*Fin controlador de incidencias*/


//CONTROLADOR ADMINISTRADORES

// Ruta para mostrar todos los administradores
Route::get('/administradores', [AdministradoresController::class, 'listarAdministradores'])->name('administradores.listar');

// Ruta para agregar un nuevo administrador
Route::post('/administradores', [AdministradoresController::class, 'agregarAdministrador'])->name('administradores.agregar');

// Ruta para eliminar un administrador
Route::delete('/administradores', [AdministradoresController::class, 'eliminarAdministrador'])->name('administradores.eliminar');

require __DIR__.'/auth.php';
