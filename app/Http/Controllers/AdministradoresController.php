<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\LogActividad;

class AdministradoresController extends Controller
{
    /* ZONA JOSE */
    /**
     * Agrega un nuevo administrador.
     */
    public function agregarAdministrador(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('administradores', 'email'),
            ],
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        ]);

        User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        
        return redirect()->route('administradores.listar')->with('success', 'Administrador agregado exitosamente');
    }

    public function listarAdministradores(){
        $administradores = User::all();
        return view('administradores.administradores', compact('administradores'));
    }

    public function eliminarAdministrador(Request $request){
    $ids = $request->input('administradores_seleccionados');
    User::whereIn('id', $ids)->delete();

    return redirect()->route('administradores.listar')->with('success', 'Administradores eliminados exitosamente');
}
    


    /* FIN ZONA JOSE */



    /* ZONA SILVIA */


    /* FIN ZONA SILVIA */


    /* ZONA FRANCISCO */



    /* FIN ZONA FRANCISCO */
    public function generalActivity(){
        $registros = LogActividad::all();
        return view('logs.logs', compact('registros'));
    }


    /* ZONA JUANMA */



    /* FIN ZONA JUANMA */
}
