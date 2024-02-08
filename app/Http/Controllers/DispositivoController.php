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
    $dispositivosAveriados = Dispositivo::join('estado_dispositivos', 'dispositivo.estado', '=', 'estado_dispositivos.id')
        ->join('tipodispositivos','dispositivo.tipo_dispositivo','=','tipodispositivos.id')
        ->join('ubicaciones','dispositivo.ubicacion_id','=','ubicaciones.id')
        ->where('estado_dispositivos.nombre', '=', 'averiado')
        ->select('dispositivo.*', 'estado_dispositivos.nombre as nombreestado','estado_dispositivos.descripcion as descripcion','tipodispositivos.nombre as nombredispositivo',
                'ubicaciones.nombre_ubicacion as nombreubicacion')
        ->get();

    $contados = $this->contarUnidadesAveriadas();

    return view('dispositivos.dispositivosAveriados')
        ->with('dispositivos', $dispositivosAveriados)
        ->with('contados', $contados);
}

public function filtrarPorTipo(Request $request)
{
    $tipoSeleccionado = $request->input('tipo');

    // Obtener dispositivos filtrados por el tipo seleccionado
    $dispositivosFiltrados = Dispositivo::join('estado_dispositivos', 'dispositivo.estado', '=', 'estado_dispositivos.id')
        ->join('tipodispositivos', 'dispositivo.tipo_dispositivo', '=', 'tipodispositivos.id')
        ->join('ubicaciones', 'dispositivo.ubicacion_id', '=', 'ubicaciones.id')
        ->where('estado_dispositivos.nombre', '=', 'averiado')
        ->when($tipoSeleccionado != 'todos', function ($query) use ($tipoSeleccionado) {
            return $query->where('tipodispositivos.nombre', '=', $tipoSeleccionado);
        })
        ->select('dispositivo.*', 'estado_dispositivos.nombre as nombreestado', 'estado_dispositivos.descripcion as descripcion', 'tipodispositivos.nombre as nombredispositivo', 'ubicaciones.nombre_ubicacion as nombreubicacion')
        ->get();

    // Retornar la vista con los resultados filtrados
    $contados = $this->contarUnidadesAveriadas();

    return view('dispositivos.dispositivosAveriados')
        ->with('dispositivos', $dispositivosFiltrados)
        ->with('contados', $contados);
}

public function contarUnidadesAveriadas()
{
     $contados= Dispositivo::join('estado_dispositivos', 'dispositivo.estado', '=', 'estado_dispositivos.id')
     ->join('tipodispositivos','dispositivo.tipo_dispositivo','=','tipodispositivos.id')
     ->join('ubicaciones','dispositivo.ubicacion_id','=','ubicaciones.id')
     ->where('estado_dispositivos.nombre', '=', 'averiado')
     ->select('dispositivo.*', 'estado_dispositivos.nombre as nombreestado','estado_dispositivos.descripcion as descripcion','tipodispositivos.nombre as nombredispositivo',
             'ubicaciones.nombre_ubicacion as nombreubicacion')
     ->get();
    return $contados->groupBy('nombredispositivo')->map->count();
}


    
public function reparar($id)
{
    // Obtener el dispositivo por su ID
    $dispositivo = Dispositivo::findOrFail($id);

    // Cambiar el estado a "reparado" 
    $dispositivo->estado = 3; // Supongo que 'reparado' es el nombre del estado
    $dispositivo->save();

    // Redirigir a la vista listarAveriados
    return redirect()->route('listarAveriados'); 
}

    public function desechar($id)
    {
        // Obtener el dispositivo por su ID
        $dispositivo = Dispositivo::findOrFail($id);

        // Cambiar el estado a "desechado" (ajusta según tu estructura de base de datos)
        $dispositivo->estado = 4;
        $dispositivo->save();

        // Redirigir a la vista o a donde sea necesario
        return redirect()->route('listarAveriados'); 
    }
    

    
    /*fin zona silvia  */


    /* zona jose*/

    /*fin zona jose  */

    
    /* zona juanma*/

    /*fin zona jose  */




}


