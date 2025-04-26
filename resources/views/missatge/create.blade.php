@extends('layouts.plantilla')

@section('titol', 'Enviar missatge a ' . $receiver->name . ' LoveConnect')

@section('contingut')
<main class="container my-5">
    <h2 class="text-center mb-4">Enviar missatge a {{ $receiver->name }}</h2>

    <form action="{{ route('missatges.store') }}" method="POST" class="container">
        @csrf

        <!-- Campo oculto con el ID del destinatario -->
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">

        <div class="mb-3">
            <label for="assumpte" class="form-label">Assumpte</label>
        
            @if (isset($assumpte))
                <input type="text" class="form-control" id="assumpte" name="assumpte" required value="{{ old('assumpte', $assumpte) }}">
            @else
                <input type="text" class="form-control" id="assumpte" name="assumpte" required value="{{ old('assumpte') }}">
            @endif
        </div>

        <div class="mb-3">
            <label for="cos" class="form-label">Cos del missatge</label>
            <textarea class="form-control" id="cos" name="cos" rows="5" required></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Enviar missatge</button>

            <a href="{{ route('usuari.perfil', str_replace(' ', '_', $receiver->name)) }}" class="btn btn-secondary">
                Tornar al perfil
            </a>
        </div>
    </form>
</main>
@endsection
