<div class="col-lg-3 col-md-4 col-sm-6 mb-4" id="card">
    <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
        {{-- Imatge amb alçada fixa --}}
        <a href="{{ route('usuari.perfil', ['name' => str_replace(' ', '_', $user->name)]) }}">
            <img src="{{ asset('storage/' . $user->imatge) }}" class="card-img-top img-fluid" alt="Foto de {{ $user->name }}"
                 style="height: 250px; object-fit: cover;">
        </a>

        <div class="card-body text-center d-flex flex-column justify-content-between p-3" style="height: 150px;">
            <div>
                <h6 class="card-title mb-1">{{ $user->name }}</h6>
                <p class="small text-muted">
                    {{ $user->edat }} anys · {{ $user->sexe }}<br>
                    Ulls: {{ $user->color_ulls }} · Cabells: {{ $user->color_cabell }}
                </p>
            </div>

            {{-- Botons d'acció --}}
            <div class="d-flex justify-content-center gap-2 mt-2">
                @if ($context === 'descobrir')
                    <a href="{{ route('buscarparella.like', $user->id) }}" class="btn btn-success btn-sm w-50">Like</a>
                    <a href="{{ route('buscarparella.dislike', $user->id) }}" class="btn btn-primary btn-sm w-50">Dislike</a>

                @elseif ($context === 'likes')
                    <a href="{{ route('buscarparella.unlike', $user->id) }}" class="btn btn-danger btn-sm w-50">Treure Like</a>
                    <a href="{{ route('buscarparella.dislike', $user->id) }}" class="btn btn-primary btn-sm w-50">Dislike</a>

                @elseif ($context === 'dislikes')
                    <a href="{{ route('buscarparella.like', $user->id) }}" class="btn btn-success btn-sm w-50">Like</a>
                    <a href="{{ route('buscarparella.undislike', $user->id) }}" class="btn btn-danger btn-sm w-50">Treure Dislike</a>
                @endif
            </div>
        </div>
    </div>
</div>
