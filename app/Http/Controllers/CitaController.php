<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /*
        index() – Mostrar totes les cites rebudes i enviades de l’usuari.

        show($id) – Veure detall d’una sol·licitud.
        
        solicitar($id) – Enviar sol·licitud de cita.

        resposta($id, $resposta) – Confirmar o rebutjar una sol·licitud
    */

    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        $citesRebudes = Cita::where('user_solicitat_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $citesEnviades = Cita::where('user_solicitant_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cita.index', compact('citesRebudes', 'citesEnviades'));
    }

    public function show($id)
    {
        $cita = Cita::findOrFail($id);

        if (Auth::user()->id !== $cita->user_solicitat_id and Auth::user()->id !== $cita->user_solicitant_id) {
            return redirect()->route('cites.index');
        }

        return view('cita.show', compact('cita'));
    }

    public function solicitar($id)
    {

        $userSolicitant = User::findOrFail(Auth::user()->id);
        $userSolicitat = User::findOrFail($id);

        $existeix = Cita::where('user_solicitant_id', $userSolicitant->id)
            ->where('user_solicitat_id', $userSolicitat->id)
            ->exists();

        if (!$existeix) {
            $existeix = Cita::where('user_solicitant_id', $userSolicitat->id)
                ->where('user_solicitat_id', $userSolicitant->id)
                ->exists();
        }

        if ($existeix) {
            return redirect()->back();
        }

        Cita::create([
            'user_solicitant_id' => $userSolicitant->id,
            'user_solicitat_id' => $userSolicitat->id,
            'estat' => "pendent"
        ]);

        return redirect()->route('cites.index');
    }

    public function resposta($id, $resposta)
    {
        $cita = Cita::findOrFail($id);

        if (Auth::user()->id !== $cita->user_solicitat_id) {
            return redirect()->route('cites.index');
        }

        if ($resposta === "acceptada") {
            $cita->estat = $resposta;
            $cita->save();
        } else if ($resposta === "rebutjada") {
            $cita->estat = $resposta;
            $cita->save();
        }

        return redirect()->route('cites.index');
    }
}
