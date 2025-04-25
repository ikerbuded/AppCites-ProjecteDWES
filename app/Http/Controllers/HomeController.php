<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    // __invoke() – Carrega la vista principal amb les seccions de buscar parella, missatges i cites

    public function __invoke()
    {
        $user = User::findOrFail(Auth::user()->id);
        $ultimMissatgeRebut = $user->missatgesRebuts()->latest()->first();
        $ultimMissatgeEnviat = $user->missatgesEnviats()->latest()->first();
        $ultimaCitaRebuda = $user->citesRebudes()->latest()->first();
        $ultimaCitaEnviada = $user->citesSolicitades()->latest()->first();

        return view('dashboard', [
            'ultimMissatgeRebut' => $ultimMissatgeRebut,
            'ultimMissatgeEnviat' => $ultimMissatgeEnviat,
            'ultimaCitaRebuda' => $ultimaCitaRebuda,
            'ultimaCitaEnviada' => $ultimaCitaEnviada,
        ]);
    }
}
