<?php

namespace App\Http\Controllers;

use App\Models\Missatge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissatgeController extends Controller
{
    /*
        index() – Mostrar llistat de missatges rebuts.

        create($receiverId) – Formulari per escriure un missatge a un usuari.

        store(Request $request) – Enviar missatge.

        show($id) – Mostrar detall del missatge rebut
    */

    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        $missatgesRebuts = Missatge::where('user_destinatari_id', $user->id)
            ->orderBy('data_enviament', 'desc')
            ->orderBy('hora_enviament', 'desc')
            ->get();

        $missatgesEnviats = Missatge::where('user_remitent_id', $user->id)
            ->orderBy('data_enviament', 'desc')
            ->orderBy('hora_enviament', 'desc')
            ->get();

        return view('missatge.index', compact('missatgesRebuts', 'missatgesEnviats'));
    }

    public function create($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $assumpte = null;
        if (request()->has('assumpte')) {
            $assumpte = request('assumpte');
        }

        return view('missatge.create', compact('receiver', 'assumpte'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'assumpte' => 'required|string|max:255',
            'cos' => 'required|string',
        ]);

        Missatge::create([
            'user_remitent_id' => Auth::user()->id,
            'user_destinatari_id' => $request->receiver_id,
            'assumpte' => $request->assumpte,
            'cos' => $request->cos,
            'data_enviament' => now()->toDateString(),
            'hora_enviament' => now()->toTimeString(),
        ]);

        return redirect()->route('missatges.index');
    }

    public function show($id)
    {
        $missatge = Missatge::findOrFail($id);

        if (Auth::user()->id !== $missatge->user_destinatari_id and Auth::user()->id !== $missatge->user_remitent_id) {
            return redirect()->route('missatges.index');
        }

        return view('missatge.show', compact('missatge'));
    }
}
