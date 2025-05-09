<?php

namespace App\Http\Controllers;

use App\Models\Interaccio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BuscarParellaController extends Controller
{
    public function index()
    {
        $usuari = Auth::user();
        $prefs = $usuari->preferencia;

        $idsJaInteractuats = Interaccio::where('usuari_id', $usuari->id)
            ->pluck('interactuat_id')
            ->toArray();

        $query = User::where('id', '!=', $usuari->id)
            ->whereNotIn('id', $idsJaInteractuats);

        if ($prefs) {
            $query->where('sexe', $prefs->sexe)
                ->where('color_cabell', $prefs->color_cabell)
                ->where('color_ulls', $prefs->color_ulls)
                ->whereRaw('TIMESTAMPDIFF(YEAR, data_naixement, CURDATE()) BETWEEN ? AND ?', [
                    $prefs->edat - 3,
                    $prefs->edat + 3
                ]);
        }

        $usuaris = $query->get();

        $likes = Interaccio::where('usuari_id', $usuari->id)
            ->where('tipus', 'like')
            ->with('interactuat')
            ->get()
            ->pluck('interactuat');

        $dislikes = Interaccio::where('usuari_id', $usuari->id)
            ->where('tipus', 'dislike')
            ->with('interactuat')
            ->get()
            ->pluck('interactuat');

        return view('buscarparella.index', compact('usuaris', 'likes', 'dislikes'));
    }

    public function likeUser($id)
    {
        $usuari = Auth::user();

        Interaccio::create([
            'usuari_id' => $usuari->id,
            'interactuat_id' => $id,
            'tipus' => 'like',
        ]);

        return redirect()->route('buscarparella.index');
    }

    public function dislikeUser($id)
    {
        $usuari = Auth::user();

        Interaccio::create([
            'usuari_id' => $usuari->id,
            'interactuat_id' => $id,
            'tipus' => 'dislike',
        ]);

        return redirect()->route('buscarparella.index');
    }

    public function unlike($id)
    {
        $usuari = Auth::user();
        Interaccio::where('usuari_id', $usuari->id)
            ->where('interactuat_id', $id)
            ->where('tipus', 'like')
            ->delete();

        return redirect()->back();
    }

    public function undislike($id)
    {
        $usuari = Auth::user();
        Interaccio::where('usuari_id', $usuari->id)
            ->where('interactuat_id', $id)
            ->where('tipus', 'dislike')
            ->delete();

        return redirect()->back();
    }
}
