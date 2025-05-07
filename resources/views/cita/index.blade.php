@extends('layouts.plantilla')

@section('contingut')
<main class="container my-5">

    <h2>Les teves cites</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs my-4" id="citesTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="rebudes-tab" data-bs-toggle="tab" data-bs-target="#rebudes" type="button" role="tab" aria-controls="rebudes" aria-selected="true">
                Rebudes
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="enviades-tab" data-bs-toggle="tab" data-bs-target="#enviades" type="button" role="tab" aria-controls="enviades" aria-selected="false">
                Enviades
            </button>
        </li>
    </ul>

    <div class="tab-content" id="citesTabsContent">

        <!-- CITES REBUDES -->
        <div class="tab-pane fade show active" id="rebudes" role="tabpanel" aria-labelledby="rebudes-tab">
            <div class="mt-4">
                @if ($citesRebudes->isEmpty())
                    <p>No tens cap cita pendent.</p>
                @else
                    <div class="list-group">
                        @foreach ($citesRebudes as $cita)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="{{ asset('storage/' . $cita->remitent->imatge) }}" alt="Avatar Usuari Destinatari" class="rounded shadow" style="width: 40px; height: auto; object-fit: cover;">
                                        <strong>{{ $cita->remitent->name }}</strong>
                                    </div>
                                    <div class="d-flex gap-2">
                                        @if ($cita->estat === 'pendent')
                                            <form action="{{ route('cites.resposta', ['id' => $cita->id, 'resposta' => 'acceptada']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Acceptar</button>
                                            </form>
                                            <form action="{{ route('cites.resposta', ['id' => $cita->id, 'resposta' => 'rebutjada']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Rebutjar</button>
                                            </form>
                                        @else
                                            <span class="text-capitalize badge @if ($cita->estat === 'acceptada') bg-success
                                                               @elseif ($cita->estat === 'rebutjada') bg-danger
                                                               @endif">
                                                {{ $cita->estat }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- CITES ENVIADES -->
        <div class="tab-pane fade" id="enviades" role="tabpanel" aria-labelledby="enviades-tab">
            <div class="mt-4">
                @if ($citesEnviades->isEmpty())
                    <p>No has enviat cap cita.</p>
                @else
                    <div class="list-group">
                        @foreach ($citesEnviades as $cita)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>    
                                    <img src="{{ asset('storage/' . $cita->destinatari->imatge) }}" alt="Avatar Usuari Destinatari" class="rounded shadow" style="width: 40px; height: auto; object-fit: cover;">
                                    <strong>{{ $cita->destinatari->name }}</strong>
                                </div>
                                <span class="text-capitalize badge 
                                    @if ($cita->estat === 'acceptada') bg-success
                                    @elseif ($cita->estat === 'rebutjada') bg-danger
                                    @else bg-secondary @endif">
                                    {{$cita->estat}}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
</main>
@endsection
