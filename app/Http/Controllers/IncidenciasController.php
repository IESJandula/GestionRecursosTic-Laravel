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

    public function store(Request $request)
    {
        // Crear una nueva instancia de Mantenimiento
        $mantenimiento = new Mantenimiento();
        $mantenimiento->tipo_mantenimiento = $request->input('tipo_mantenimiento');
        $mantenimiento->ticket_id = $request->input('ticket_id');
        $mantenimiento->dispositivo_id = $request->input('dispositivo_id');

        // Establecer automáticamente la fecha de inicio
        $mantenimiento->fecha_inicio = now();

        // Calcular la fecha de fin (por ejemplo, añadir 3 días a la fecha de inicio)
        $duracion_estimada = 3; // Cambiar esto según la duración estimada del mantenimiento que nosotros digamos de poner
        $fecha_fin = now()->addDays($duracion_estimada);

        $mantenimiento->fecha_fin = $fecha_fin;
        $mantenimiento->asignacion_equipo_mantenimiento_id = $request->input('asignacion_equipo_mantenimiento_id');
        $mantenimiento->estado = $request->input('estado');

        // Guardar el mantenimiento
        $mantenimiento->save();

        // Redireccionar o hacer cualquier otra cosa que necesites después de guardar
        return redirect()->route('mantenimientos.store')->with('success', '¡Datos guardados correctamente!');
    
    }

    //borrar incidencia
    public function destroy($id)
    {
        // Busca la incidencia por su ID
        $mantenimiento = Mantenimiento::findOrFail($id);

        // Elimina la incidencia
        $mantenimiento->delete();

        // Redirecciona a la vista de la lista de mantenimientos con un mensaje de éxito
        return redirect()->route('mantenimientos.store')->with('success', '¡Incidencia eliminada correctamente!');
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        return view('incidencias.edit', compact('mantenimiento'));
    }
    
    public function update(Request $request, $id)
    {
        // Encuentra el mantenimiento por su ID
        $mantenimiento = Mantenimiento::findOrFail($id);
    
        // Actualiza los campos del mantenimiento con los datos del formulario
        $mantenimiento->tipo_mantenimiento = $request->input('tipo_mantenimiento');
        $mantenimiento->ticket_id = $request->input('ticket_id');
        $mantenimiento->dispositivo_id = $request->input('dispositivo_id');
        $mantenimiento->fecha_inicio = $request->input('fecha_inicio');
        $mantenimiento->fecha_fin = $request->input('fecha_fin');
        $mantenimiento->asignacion_equipo_mantenimiento_id = $request->input('asignacion_equipo_mantenimiento_id');
        $mantenimiento->estado = $request->input('estado');
    
        // Guarda los cambios en la base de datos
        $mantenimiento->save();
    
        // Redirige a la vista de edición con un mensaje de éxito
        return redirect()->route('mantenimientos.list', $mantenimiento->id)->with('success', '¡Datos actualizados correctamente!');
    }
    

    //fin zona juanma

}
