@extends('layouts.plantilla')

@section('titol', 'Panell Control LoveConnect')

@section('contingut')
<main class="container my-4">

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @php
            $cards = [
                ['icon' => 'search-heart', 'title' => 'Buscar parella', 'text' => 'Troba la teva mitja taronja.', 'btn' => 'Comença', 'color' => 'primary', 'ruta' => 'buscarparella.index'],
                ['icon' => 'chat-dots', 'title' => 'Missatges', 'text' => 'Llegeix i respon els teus missatges.', 'btn' => 'Missatges', 'color' => 'secondary', 'ruta' => 'missatges.index'],
                ['icon' => 'calendar-heart', 'title' => 'Cites', 'text' => 'Consulta les teves cites.', 'btn' => 'Les meves cites', 'color' => 'danger', 'ruta' => 'cites.index'],
                ['icon' => 'person-circle', 'title' => 'Perfil', 'text' => 'Actualitza les teves dades personals.', 'btn' => 'El meu perfil', 'color' => 'info', 'ruta' => 'usuari.perfil'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col">
                <div class="card text-center shadow-lg rounded-4 p-3">
                    <div class="display-4 mb-3 text-{{ $card['color'] }}">
                        <i class="bi bi-{{ $card['icon'] }}"></i>
                    </div>
                    <h4 class="card-title">{{ $card['title'] }}</h4>
                    <p class="card-text">{{ $card['text'] }}</p>
                    <a href="{{ route($card['ruta'], ['name' => str_replace(' ', '_', Auth::user()->name)]) }}" class="btn btn-outline-{{ $card['color'] }}">{{ $card['btn'] }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card-group shadow-sm my-4">
        <div class="card p-3">
            <h5>Últim missatge rebut</h5>
            @if($ultimMissatgeRebut)
                <p class="card-text">{{ $ultimMissatgeRebut->remitent->name }}</p>
            @else
                <p class="card-text">Encara no has rebut cap missatge.</p>
            @endif
        </div>
        <div class="card p-3">
            <h5>Últim missatge enviat</h5>
            @if($ultimMissatgeEnviat)
                <p class="card-text">{{ $ultimMissatgeEnviat->destinatari->name }}</p>
            @else
                <p class="card-text">Encara no has enviat cap missatge.</p>
            @endif
        </div>
        <div class="card p-3">
            <h5>Última cita rebuda</h5>
            @if($ultimaCitaRebuda)
                <p class="card-text">{{ $ultimaCitaRebuda->remitent->name }}</p>
            @else
                <p class="card-text">Encara no tens cap cita rebuda.</p>
            @endif
        </div>
        <div class="card p-3">
            <h5>Última cita enviada</h5>
            @if($ultimaCitaEnviada)
                <p class="card-text">{{ $ultimaCitaEnviada->destinatari->name }}</p>
            @else
                <p class="card-text">Encara no has enviat cap cita.</p>
            @endif
        </div>
    </div>
</main>


@endsection
