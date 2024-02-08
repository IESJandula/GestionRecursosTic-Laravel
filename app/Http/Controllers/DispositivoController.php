<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;

class DispositivoController extends Controller
{
    public function list()
    {
        $dispositivos = dispositivo::all();
        return view('dispositivos.listaDispositivos', compact('dispositivos'));
    }
}


