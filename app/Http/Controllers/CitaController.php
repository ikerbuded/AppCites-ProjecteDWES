<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    /*
        index() – Mostrar totes les cites pendents que ha rebut l’usuari.

        create($userId) – Mostrar confirmació de sol·licitud.

        store(Request $request) – Enviar sol·licitud de cita.

        show($id) – Veure detall d’una sol·licitud.

        updateStatus($id) – Confirmar o rebutjar una sol·licitud
    */

    public function index()
    {

        return view('cites.index');
    }
}
