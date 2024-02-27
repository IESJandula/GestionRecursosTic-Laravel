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
        $mantenimientos = Mantenimiento::all();
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
        $ubicaciones = Ubicacion::select('nombre_ubicacion')->distinct()->get();
    
        return view('incidencias', [
            'dispositivos' => $dispositivos,
            'ubicaciones' => $ubicaciones
        ]);
    }
    public function addNuevaIncidencia(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'tipo_dispositivo' => 'required',
            'dispositivo' => 'required',
            'ubicacion' => 'required',
            'descripcion_problema' => 'required',
        ]);
    
        // Crear un nuevo objeto TicketMantenimiento y asignar los valores del formulario
        $ticket = new TicketsMantenimiento();
        $ticket->tipo_dispositivo = $request->tipo_dispositivo;
        $ticket->dispositivo_id = $request->dispositivo;
        $ticket->ubicacion = $request->ubicacion;
        $ticket->descripcion_problema = $request->descripcion_problema;
    
        // Asignar la fecha de solicitud con el momento actual
        $ticket->fecha_solicitud = Carbon::now();
    
        // Guardar el nuevo ticket en la base de datos
        $ticket->save();
    
        // Redirigir a una página de confirmación o a donde sea apropiado
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
