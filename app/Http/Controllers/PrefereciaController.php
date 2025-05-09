<?php

namespace App\Http\Controllers;

use App\Models\Preferencia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PrefereciaController extends Controller
{

    public function __invoke(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $preferencia = Preferencia::where('user_id', $user->id)->first();

        if ($preferencia) {
            // Actualitzem si ja existeixen
            $preferencia->edat = $request->edat;
            $preferencia->sexe = $request->sexe;
            $preferencia->color_cabell = $request->color_cabell;
            $preferencia->color_ulls = $request->color_ulls;
            $preferencia->save();
        } else {
            // Creem si no existeixen
            $preferencia = new Preferencia();
            $preferencia->user_id = $user->id;
            $preferencia->edat = $request->edat;
            $preferencia->sexe = $request->sexe;
            $preferencia->color_cabell = $request->color_cabell;
            $preferencia->color_ulls = $request->color_ulls;
            $preferencia->save();
        }

        return redirect()->route('usuari.perfil', ['name' => str_replace(' ', '_', Auth::user()->name)]);
    }
}
