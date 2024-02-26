<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ubicacion;
use App\Models\Dispositivo;
use App\Models\LogActividad;
use Carbon\Carbon;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la ubicación a editar
        $ubicacion = Ubicacion::findOrFail($id);
        
        // Devolver la vista del formulario de edición con los datos de la ubicación
        return view('dispositivos.editarUbicacion', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Obtener la ubicación a actualizar
        $ubicacion = Ubicacion::findOrFail($id);
        
        // Validar los datos de entrada
        $request->validate([
            'nombre_ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Actualizar los valores de la ubicación con los nuevos datos
        $ubicacion->nombre_ubicacion = $request->input('nombre_ubicacion');
        $ubicacion->descripcion = $request->input('descripcion');
        
        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Actualizada la ubicación ' . $ubicacion->nombre_ubicacion;
        $newActivity->save();
        // Guardar los cambios en la ubicación
        $ubicacion->save();

        // Redirigir a alguna vista o ruta apropiada
        return redirect('ubicaciones')->with('success', '¡Datos actualizados correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Obtener la ubicación a eliminar
        $ubicacion = Ubicacion::findOrFail($id);
        
        // Eliminar la ubicación
        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Creada la ubicación ' . $ubicacion->nombre_ubicacion;
        $newActivity->save();
        
        $ubicacion->delete();

        // Redirigir a alguna vista o ruta apropiada
        return redirect('ubicaciones')->with('success', '¡Ubicación eliminada correctamente!');
    }



    /** zona juanma */
    public function filtrarPorUbicacion(Request $request)
    {
        // Obtener el ID de la ubicación seleccionada desde la solicitud
        $ubicacionId = $request->input('ubicacion');

        // Obtener los dispositivos filtrados por la ubicación seleccionada
        $dispositivos = Dispositivo::where('ubicacion_id', $ubicacionId)->get();

        $ubicaciones = Ubicacion::all();

        // Pasar los dispositivos filtrados a la vista
        return view('dispositivos.listaDispositivos', compact('dispositivos', 'ubicaciones'));
    }

    public function ubicaciones()
    {
        $ubicaciones = Ubicacion::all();
        return view('dispositivos.ubicaciones', compact('ubicaciones'));
    }

    public function crearUbicacion(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre_ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Crear una nueva instancia del modelo Ubicacion
        $ubicacion = new Ubicacion();

        // Asignar los valores del formulario a los atributos del modelo
        $ubicacion->nombre_ubicacion = $request->input('nombre_ubicacion');
        $ubicacion->descripcion = $request->input('descripcion');

        // Guardar la ubicación en la base de datos
        $newActivity = new LogActividad();
        $newActivity->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        $newActivity->ActividadRealizada = 'Creada la ubicación ' . $ubicacion->nombre_ubicacion;
        $newActivity->save();
        

        $ubicacion->save();

        // Redirigir a alguna vista o ruta apropiada
        return redirect('ubicaciones')->with('success', '¡Datos guardados correctamente!');
    }


    /** termina zona juanma */




    /** zona silvia */

    /** fin zona silvia */



    /** zona fran */


    /** fin zona fran */


    /** zona jose */



    /** fin zona jose */



}
