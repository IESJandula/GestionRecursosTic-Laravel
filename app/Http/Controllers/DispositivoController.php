<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Ubicacion;

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
        return view('dispositivos.listaDispositivos', compact('dispositivos','ubicaciones'));
    }

    /*zona fin juanma*/

    /*fin zona jose  */




}


