@extends('layouts.plantilla')

@section('contingut')
<main class="container my-5">

    <h2>Els teus missatges</h2>

    <!-- Tabs de navegació -->
    <ul class="nav nav-tabs my-4" id="missatgesTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="rebuts-tab" data-bs-toggle="tab" data-bs-target="#rebuts" type="button" role="tab" aria-controls="rebuts" aria-selected="true">
                Rebuts
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="enviats-tab" data-bs-toggle="tab" data-bs-target="#enviats" type="button" role="tab" aria-controls="enviats" aria-selected="false">
                Enviats
            </button>
        </li>
    </ul>

    <!-- Contingut dels tabs -->
    <div class="tab-content" id="missatgesTabsContent">
        <!-- Missatges Rebuts -->
        <div class="tab-pane fade show active" id="rebuts" role="tabpanel" aria-labelledby="rebuts-tab">
            <div class="mt-4">
                @if ($missatgesRebuts->isEmpty())
                    <p>No tens cap missatge rebut.</p>
                @else
                    <div class="list-group">
                        @foreach ($missatgesRebuts as $missatge)
                            <a href="{{ route('missatges.show', $missatge->id) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $missatge->assumpte }}</strong> — de {{ $missatge->remitent->name }}
                                    </div>
                                    <small>{{ \Carbon\Carbon::parse($missatge->data_enviament)->format('d/m/Y') }} {{ $missatge->hora_enviament }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Missatges Enviats -->
        <div class="tab-pane fade" id="enviats" role="tabpanel" aria-labelledby="enviats-tab">
            <div class="mt-4">
                @if ($missatgesEnviats->isEmpty())
                    <p>No has enviat cap missatge.</p>
                @else
                    <div class="list-group">
                        @foreach ($missatgesEnviats as $missatge)
                            <a href="{{ route('missatges.show', $missatge->id) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $missatge->assumpte }}</strong> — a {{ $missatge->destinatari->name }}
                                    </div>
                                    <small>{{ \Carbon\Carbon::parse($missatge->data_enviament)->format('d/m/Y') }} {{ $missatge->hora_enviament }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</main>
@endsection
