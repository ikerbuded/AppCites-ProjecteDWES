<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // __invoke() – Carrega la vista principal amb les seccions de buscar parella, missatges i cites

    public function __invoke()
    {

        return view('dashboard');
    }
}
