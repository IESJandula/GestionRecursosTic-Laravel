<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\TipoDispositivo;

class DispositivoController extends Controller
{
      /* zona fran */
    public function list()
    {
        $dispositivos = dispositivo::all();
        return view('dispositivos.listaDispositivos', compact('dispositivos'));
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
    public function agregarEquipo(Request $request){
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

    public function mostrarTiposDispositivos(){
        $tiposDispositivos = TipoDispositivo::all();

        // Pasar los datos a la vista 'mostrar-tipos-dispositivos.blade.php'
        return view('mostrar-tipos-dispositivos', compact('tiposDispositivos'));
    }

    public function eliminarTiposDispositivos(Request $request){
        // Obtener los IDs de los tipos de dispositivos seleccionados desde el formulario
        $tiposSeleccionados = $request->input('tipos_seleccionados', []);

        // Eliminar los tipos de dispositivos seleccionados de la base de datos
        TipoDispositivo::whereIn('id', $tiposSeleccionados)->delete();

        // Redireccionar de vuelta a la página anterior o a donde desees
        return redirect()->back()->with('success', 'Dispositivos eliminados exitosamente');
    }


    /*fin zona jose  */

    
    /* zona juanma*/

    /*fin zona jose  */




}


