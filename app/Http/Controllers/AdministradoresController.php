<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdministradoresController extends Controller
{
    /* ZONA JOSE */
    /**
     * Agrega un nuevo administrador.
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:administradores,email',
            'password' => 'required|string|min:6',
        ]);

        Administrador::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Administrador agregado correctamente.');
    }


    /* FIN ZONA JOSE */



    /* ZONA SILVIA */


    /* FIN ZONA SILVIA */


    /* ZONA FRANCISCO */



    /* FIN ZONA FRANCISCO */



    /* ZONA JUANMA */



    /* FIN ZONA JUANMA */
}
