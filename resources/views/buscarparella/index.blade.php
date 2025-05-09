@extends('layouts.plantilla')

@section('contingut')
{{-- Navegació entre seccions --}}
<ul class="nav nav-tabs mb-4 mt-5" id="parellaTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="veure-tab" data-bs-toggle="tab" href="#veure" role="tab">Descobrir</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="likes-tab" data-bs-toggle="tab" href="#likes" role="tab">Likes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="dislikes-tab" data-bs-toggle="tab" href="#dislikes" role="tab">Dislikes</a>
    </li>
</ul>

<div class="tab-content" id="parellaTabsContent">
    {{-- Secció: Usuaris disponibles per valorar --}}
    <div class="tab-pane fade show active" id="veure" role="tabpanel">
        <div class="row justify-content-center">
            @forelse ($usuaris as $user)
                 @include('buscarparella.card', ['user' => $user, 'context' => 'descobrir'])
            @empty
                <p class="text-center">No hi ha usuaris per mostrar.</p>
            @endforelse
        </div>
    </div>

    {{-- Secció: Likeats --}}
    <div class="tab-pane fade" id="likes" role="tabpanel">
        <div class="row justify-content-center">
            @forelse ($likes as $user)
                @include('buscarparella.card', ['user' => $user, 'context' => 'likes'])
            @empty
                <p class="text-center">Encara no has fet like a ningú.</p>
            @endforelse
        </div>
    </div>

    {{-- Secció: Dislikeats --}}
    <div class="tab-pane fade" id="dislikes" role="tabpanel">
        <div class="row justify-content-center">
            @forelse ($dislikes as $user)
                @include('buscarparella.card', ['user' => $user, 'context' => 'dislikes'])
            @empty
                <p class="text-center">Encara no has fet dislike a ningú.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
