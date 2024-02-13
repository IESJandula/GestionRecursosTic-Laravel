<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;

use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    //zona fran
    public function list()
    {
        $mantenimientos = Mantenimiento::all();
        return view('incidencias.incidencias', compact('mantenimientos'));

    }
    //fin zona fran

    //zona silvia

    //fin zona silvia

    //zona jose

    //fin zona jose

    //zona juanma

    //fin zona juanma

}
