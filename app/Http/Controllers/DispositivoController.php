<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Dispositivo;

use App\Models\Ubicacion;

use App\Models\TipoDispositivo;



class DispositivoController extends Controller
{
    /* zona fran */
    public function list()
    {
        $dispositivos = dispositivo::all();
        return view('dispositivos.listaDispositivos', compact('dispositivos'));
    }
    /*LISTAR LOS DISPOSITIVOS////////////////////////////////////////*/
    public function listar()
    {
        $dispositivos = dispositivo::all();
        $ubicaciones = Ubicacion::all(); 
        $tipos_dispositivos= TipoDispositivo::all();
        return view('dispositivos.stock', compact('dispositivos', 'ubicaciones', 'tipos_dispositivos'));
    }
    /*AÑADIR LOS DISPOSITIVOS////////////////////////////////////////*/
    public function addDispositivos()
    {
        $tiposDispositivos = TipoDispositivo::all();
        $ubicaciones = Ubicacion::all(); // Suponiendo que 'Ubicacion' es el modelo de tus ubicaciones.
        return view('dispositivos.addDispositivos', compact('tiposDispositivos', 'ubicaciones'));
    }

    public function insertDispositivos(Request $request)
    {
        // Validar los datos del formulario
    /*    $request->validate([
            'tipo_dispositivo' => 'required',
            'num_serie' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'fecha_adquisicion' => 'required|date',
            'ubicacion_id' => 'required',
            'cod_barras' => 'required',
        ]);
*/
        // Crear una nueva instancia de Dispositivo
        $newDispositivo = new Dispositivo();

        // Asignar los valores del formulario a los atributos del modelo
        $newDispositivo->tipo_dispositivo = $request->tipo_dispositivo;
        $newDispositivo->num_serie = $request->num_serie;
        $newDispositivo->modelo = $request->modelo;
        $newDispositivo->marca = $request->marca; 
        $newDispositivo->fecha_adquisicion = $request->fecha_adquisicion;
        $newDispositivo->estado = $request->estado; // Si este campo está en el formulario
        $newDispositivo->ubicacion_id = $request->ubicacion_id;
        $newDispositivo->cod_barras = $request->cod_barras;
        $newDispositivo->observaciones = $request->observaciones;

        // Guardar el modelo en la base de datos
        $newDispositivo->save();

        // Redireccionar a la página deseada después de guardar
        return redirect('stock')->with('success', '¡Datos guardados correctamente!');

    }

    /*MODIFICAR LOS DISPOSITIVOS////////////////////////////////////////*/
    public function editarDispositivo()
    {
        $dispositivos = dispositivo::all();
        return view('dispositivos.stock', compact('dispositivos'));
    }
    /*fin zona fran  */



    /* zona silvia*/
    public function listarAveriados()
    {
        $dispositivosAveriados = dispositivo::all();
        return view('dispositivos.listaDispositivos', compact('dispositivos'));
    }
    /*fin zona silvia  */


    /* zona jose*/
    public function agregarEquipo(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $tipoDispositivo = new TipoDispositivo([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),

        ]);

        $tipoDispositivo->save();

        return redirect()->route('agregar.equipo')->with('success', 'Equipo agregado exitosamente');
    }

    public function mostrarTiposDispositivos()
    {
        $tiposDispositivos = TipoDispositivo::all();

        // Pasar los datos a la vista 'mostrar-tipos-dispositivos.blade.php'
        return view('mostrar-tipos-dispositivos', compact('tiposDispositivos'));
    }

    public function eliminarTiposDispositivos(Request $request)
    {
        // Obtener los IDs de los tipos de dispositivos seleccionados desde el formulario
        $tiposSeleccionados = $request->input('tipos_seleccionados', []);

        // Eliminar los tipos de dispositivos seleccionados de la base de datos
        TipoDispositivo::whereIn('id', $tiposSeleccionados)->delete();

        // Redireccionar de vuelta a la página anterior o a donde desees
        return redirect()->back()->with('success', 'Dispositivos eliminados exitosamente');
    }


    /*fin zona jose  */


    /* zona juanma*/


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

    /*zona fin juanma*/

    /*fin zona jose  */
}
