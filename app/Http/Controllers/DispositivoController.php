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
        $ubicaciones = Ubicacion::all(); 
        return view('dispositivos.listaDispositivos', compact('dispositivos', 'ubicaciones'));
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
    /*MODIFICAR DISPOSITIVOS////////////////////////////////////////*/
    public function editarDispositivos($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $tiposDispositivos = TipoDispositivo::all();
        $ubicaciones = Ubicacion::all();
        return view('dispositivos.modifyDispositivos', compact('dispositivo', 'tiposDispositivos', 'ubicaciones'));
    }

    /*ACTUALIZAR LOS DISPOSITIVOS EN LA BD*/
    public function updateDispositivos(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipo_dispositivo' => 'required',
            'num_serie' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'fecha_adquisicion' => 'required|date',
            'ubicacion_id' => 'required',
            'cod_barras' => 'required',
        ]);

        // Obtener el dispositivo por su ID
        $updateDispositivo = Dispositivo::findOrFail($id);

        // Asignar los valores del formulario a los atributos del modelo
        $updateDispositivo->tipo_dispositivo = $request->tipo_dispositivo;
        $updateDispositivo->num_serie = $request->num_serie;
        $updateDispositivo->modelo = $request->modelo;
        $updateDispositivo->marca = $request->marca; 
        $updateDispositivo->fecha_adquisicion = $request->fecha_adquisicion;
        $updateDispositivo->estado = $request->estado; // Si este campo está en el formulario
        $updateDispositivo->ubicacion_id = $request->ubicacion_id;
        $updateDispositivo->cod_barras = $request->cod_barras;
        $updateDispositivo->observaciones = $request->observaciones;

        // Guardar el modelo en la base de datos
        $updateDispositivo->save();

        // Redireccionar a la página deseada después de guardar
        return redirect('stock')->with('success', '¡Datos actualizados correctamente!');
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

    /*ELIMINAR LOS DISPOSITIVOS////////////////////////////////////////*/
    public function eliminarDispositivo($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
        $dispositivo->delete();
        return redirect('stock')->with('success', '¡Dispositivo eliminado correctamente!');
    }
    /*fin zona fran  */



    /* zona silvia*/


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////V  I  S  T  A     D  I  S  P  O  S  I  T  I  V  O  S    A  V  E  R  I  A  D  O  S////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    $dispositivo->estado = 3;
    $dispositivo->save();

    // Redirigir a la vista listarAveriados
    return redirect()->route('listarAveriados'); 
}

    public function desechar($id)
    {
        // Obtener el dispositivo por su ID
        $dispositivo = Dispositivo::findOrFail($id);

        // Cambiar el estado a "desechado" 
        $dispositivo->estado = 4;
        $dispositivo->save();

        // Redirigir a la vista o a donde sea necesario
        return redirect()->route('listarAveriados'); 
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////V  I  S  T  A     A  S  I  G  N  A  R    L  O  C  A  L  I  Z  A  C  I  O  N  E  S////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

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

        return redirect()->route('mostrar.tipos.dispositivos')->with('success', 'Equipo agregado exitosamente');
    }

    public function mostrarTiposDispositivos()
    {
        $tiposDispositivos = TipoDispositivo::all();

        // Pasar los datos a la vista 'TipoDispositivo'
        return view('dispositivos.TipoDispositivo', compact('tiposDispositivos'));
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

    public function editarEquipo(Request $request) {
        if ($request->has('editar_equipo')) {
            $equipoId = $request->input('equipo_id');
            
            // Establece una variable de sesión para indicar que se está editando un equipo
            session(['editandoEquipo' => $equipoId]);
        } else {
            // Si no se está editando, elimina la variable de sesión
            session()->forget('editandoEquipo');
        }
    
        // Luego, redirige de vuelta a la misma página
        return redirect()->back();
    }

    public function guardarCambios(Request $request) {
        $request->validate([
            'equipo_id' => 'required|integer', // Cambia el tipo según sea necesario
            'nombre_editado' => 'required|string|max:255',
            'descripcion_editada' => 'nullable|string|max:255',
        ]);
    
        // Obtener los datos del formulario
        $equipoId = $request->input('equipo_id');
        $nombreEditado = $request->input('nombre_editado');
        $descripcionEditada = $request->input('descripcion_editada');
    
        // Realizar la lógica de edición aquí
        $equipo = TipoDispositivo::find($equipoId);
        if ($equipo) {
            $equipo->nombre = $nombreEditado;
            $equipo->descripcion = $descripcionEditada;
            $equipo->save();
            
            //Limpiar la variable de sesion de edicion para que no me aparezca el formulario una vez se pulse el boton de guardar cambios
            session()->forget('editandoEquipo');

            // Redirigir de vuelta a la misma vista con un mensaje de éxito
            return redirect()->back()->with('success', 'Cambios guardados exitosamente');
        } else {
            // Manejar el caso en el que el equipo no se encuentre
            return redirect()->back()->with('error', 'El equipo no pudo ser encontrado');
        }
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
        $ubicacion->save();

        // Redirigir a alguna vista o ruta apropiada
        return redirect('ubicaciones')->with('success', '¡Datos guardados correctamente!');
    }

    /*zona fin juanma*/

    /*fin zona jose  */
}
