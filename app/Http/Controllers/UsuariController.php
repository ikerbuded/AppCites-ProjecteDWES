<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariController extends Controller
{
    /*
        index() – Llistar tots els usuaris (per la secció de buscar parella).

        show($id) – Mostrar la vista detall d’un usuari.

        edit() – Formulari per editar dades personals.

        update(Request $request) – Actualitzar les dades de l’usuari
    */

    public function index()
    {

        return view('buscarparella.index');
    }
}
