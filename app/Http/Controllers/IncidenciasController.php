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

    public function store(Request $request){
        // Crear una nueva instancia de Mantenimiento
        $mantenimiento = new Mantenimiento();
        $mantenimiento->tipo_mantenimiento = $request->input('tipo_mantenimiento');
        $mantenimiento->ticket_id = $request->input('ticket_id');
        $mantenimiento->dispositivo_id = $request->input('dispositivo_id');
        // Establecer automáticamente la fecha de inicio
        $mantenimiento->fecha_inicio = now(); // Esto establecerá la fecha y hora actual
        // El campo fecha_fin se dejará en blanco por ahora, ya que aún no ha terminado el mantenimiento
        $mantenimiento->fecha_fin = null;
        $mantenimiento->asignacion_equipo_mantenimiento = $request->input('asignacion_equipo_mantenimiento');
        $mantenimiento->estado = $request->input('estado');
        $mantenimiento->save();

        // Redireccionar o hacer cualquier otra cosa que necesites después de guardar

        return redirect()->route('ruta.nueva'); // Reemplaza 'ruta.nueva' por el nombre de la ruta que desees
    }

    //fin zona juanma

}
