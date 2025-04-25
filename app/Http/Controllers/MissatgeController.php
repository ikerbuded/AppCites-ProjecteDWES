<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('missatges.index');
    }
}
