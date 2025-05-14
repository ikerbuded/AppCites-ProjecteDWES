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

    public function edit(string $name)
    {
        $nomReal = str_replace('_', ' ', $name);
        $usuari = User::where('name', $nomReal)->firstOrFail();
        return view('usuari.editar', compact('usuari'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sexe' => 'required|string',
            'data_naixement' => 'required|date',
            'color_cabell' => 'required|string',
            'color_ulls' => 'required|string',
        ]);

        $usuari = User::findOrFail($id);

        $usuari->update([
            'name' => $request->name,
            'sexe' => $request->sexe,
            'data_naixement' => $request->data_naixement,
            'color_cabell' => $request->color_cabell,
            'color_ulls' => $request->color_ulls,
        ]);

        return redirect()->route('usuari.perfil', ['name' => str_replace(' ', '_', $usuari->name)]);
    }
}
