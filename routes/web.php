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
});
