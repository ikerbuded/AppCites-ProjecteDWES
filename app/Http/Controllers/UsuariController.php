<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariController extends Controller
{
    /*
        show($id) – Mostrar la vista detall d’un usuari.

        edit() – Formulari per editar dades personals.

        update(Request $request) – Actualitzar les dades de l’usuari
    */

    public function show($name)
    {
        $name = str_replace('_', ' ', $name); // Canviem els _ per espais per buscar
        $user = User::where('name', $name)->firstOrFail();
        $fotos = $user->fotos()->get();

        $isOwnProfile = false;

        if (Auth::user()->id == $user->id) {
            $isOwnProfile = true;
        }

        return view('usuari.perfil', [
            'user' => $user,
            'fotos' => $fotos,
            'isOwnProfile' => $isOwnProfile
        ]);
    }
}
