@extends('layouts.plantilla')

@section('titol', 'Missatge LoveConnect')

@section('contingut')
<main class="container my-5">
    <h2 class="mb-4">{{ $missatge->assumpte }}</h2>

    <div class="mb-3">
        <strong>De:</strong> {{ $missatge->remitent->name }}
    </div>

    <div class="mb-3">
        <strong>Data:</strong> {{ \Carbon\Carbon::parse($missatge->data_enviament)->format('d/m/Y') }} 
        <strong>Hora:</strong> {{ $missatge->hora_enviament }}
    </div>

    <div class="border p-3 rounded">
        {{ $missatge->cos }}
    </div>

    @if (Auth::user()->id === $missatge->user_destinatari_id)
    <a href="{{ route('missatges.create', ['receiverId' => $missatge->user_remitent_id, 'assumpte' => 'Reply: ' . $missatge->assumpte]) }}" class="btn btn-primary mt-4">
        Respondre
    </a>
    
    <a href="{{ route('missatges.index') }}" class="btn btn-secondary mt-4">Tornar als missatges</a>
@endif
</main>
@endsection
