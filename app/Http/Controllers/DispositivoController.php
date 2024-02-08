<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;

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

    /*fin zona jose  */




}


