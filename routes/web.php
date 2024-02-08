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


//ruta para acceder a la lista de dispositivos
Route::get('/dispositivos', [DispositivoController::class, 'list']);