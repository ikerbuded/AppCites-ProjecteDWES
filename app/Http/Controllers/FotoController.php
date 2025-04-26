<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::user()->id);
        $fotos = $user->fotos()->get();

        return view('usuari.fotos', ['fotos' => $fotos]);
    }

    public function store(Request $request)
    {
        $foto = new Foto();
        $foto->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $storageLink = $request->file('image')->store('usuarisImatges', 'public');
            $foto->ruta = $storageLink;
        }

        $foto->save();


        return redirect()->route('user.modificarfotos');
    }

    public function destroy(String $id)
    {
        $foto = Foto::findOrFail($id);
        $usuari = User::findOrFail($foto->user_id);

        // Si la imatge es l'actual avatar
        if ($foto->ruta == $usuari->imatge) {
            // Busquem una altra imatge del mateix usuari que no sigui la que eliminem
            $altreFoto = $usuari->fotos()->where('id', '!=', $foto->id)->first();

            if ($altreFoto) {
                $usuari->imatge = $altreFoto->ruta;
            } else {
                if ($usuari->sexe == 'home') {
                    $usuari->imatge = 'usuarisImatges/defaultHombre.webp';
                } elseif ($usuari->sexe == 'dona') {
                    $usuari->imatge = 'usuarisImatges/defaultMujer.webp';
                } else {
                    $usuari->imatge = 'usuarisImatges/default.webp';
                }
            }

            $usuari->save();
        }

        // Esborrem la imatge del disc
        Storage::disk('public')->delete($foto->ruta);
        $foto->delete();
        return redirect()->route('user.modificarfotos');
    }

    public function assignarAvatar(String $id)
    {
        $foto = Foto::findOrFail($id);
        $user = User::findOrFail($foto->user_id);

        $user->imatge = $foto->ruta;
        $user->save();

        return redirect()->route('user.modificarfotos');
    }
}
