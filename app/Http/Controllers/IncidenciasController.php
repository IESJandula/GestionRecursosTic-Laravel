<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Dispositivo;
use Illuminate\Http\Request;
use App\Models\LogActividad;
use App\Models\Ubicacion;
use App\Models\TicketsMantenimiento;
use Carbon\Carbon;

class IncidenciasController extends Controller
{
    //zona fran
    public function list()
    {
        $mantenimientos = TicketsMantenimiento::all();
        return view('incidencias.incidencias', compact('mantenimientos'));

    }
    //fin zona fran

    //zona silvia

    //fin zona silvia

    //zona jose

    
    
    public function nuevaIncidencia() {
        $dispositivos = Dispositivo::join('tipodispositivos', 'dispositivo.tipo_dispositivo', '=', 'tipodispositivos.id')
            ->select('dispositivo.*', 'tipodispositivos.nombre as nombre_tipo_dispositivo')
            ->get();
    
        // Obtener ubicaciones únicas
        $ubicaciones = Ubicacion::select('id', 'nombre_ubicacion')->distinct()->get();
        
    
        return view('incidencias', [
            'dispositivos' => $dispositivos,
            'ubicaciones' => $ubicaciones
        ]);
    }
    public function addNuevaIncidencia(Request $request){
        $request->validate([
            'usuario_id' => 'required',
            'dispositivo' => 'required',
            'ubicacion' => 'required',
            'descripcion_problema' => 'required',
        ]);
    
        // Crea una nueva incidencia
        TicketsMantenimiento::create([
            'usuario_id' => $request->usuario_id,
            'dispositivo_id' => $request->dispositivo,
            'ubicacion_id' => $request->ubicacion,
            'descripcion_problema' => $request->descripcion_problema,
            'fecha_solicitud' => now(),
            
             // Puedes ajustar esto según tu necesidad
        ]);
        $dispositivo = Dispositivo::find($request->dispositivo);
        if ($dispositivo) {
            $dispositivo->estado = '1';
            $dispositivo->save();
        }
    
        // Redirige a donde desees después de crear la incidencia
        return view('auth.login');
    }

    //fin zona jose

    //zona juanma

    public function store(Request $request)
    {
        $request->validate([
            'tipo_mantenimiento' => 'required', // Asegura que 'tipo_mantenimiento' no sea nulo
        ]);
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

        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Creada la incidencia con id ' . $mantenimiento->ticket_id;
        $newActivity->save();
        // Guardar el mantenimiento
        $mantenimiento->save();

        // Redireccionar o hacer cualquier otra cosa que necesites después de guardar
        //return redirect()->route('mantenimientos.store')->with('success', '¡Datos guardados correctamente!');
        return redirect()->route('login')->with('success', '¡Datos guardados correctamente!');
    
    }

    public function create()
{
    return view('incidencias.nuevaIncidencia');
}


    //borrar incidencia
    public function destroy($id)
    {
      
        // Busca la incidencia por su ID
        $mantenimiento = Mantenimiento::findOrFail($id);

        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Eliminada la incidencia con id ' . $mantenimiento->id;
        $newActivity->save();

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
    
        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Actualizada esto de la incidencia con id ' . $mantenimiento->id . ' a '.$mantenimiento->estado;
        $newActivity->save();
        // Guarda los cambios en la base de datos
        $mantenimiento->save();
    
        // Redirige a la vista de edición con un mensaje de éxito
        return redirect()->route('mantenimientos.list', $mantenimiento->id)->with('success', '¡Datos actualizados correctamente!');
    }
    

    //fin zona juanma

}
