@extends('layouts.plantilla')

@section('contingut')
<main class="container my-5">

    <h2 class="text-center mb-4">Perfil de {{ $user->name }}</h2>

    <div class="row g-4">
        <!-- Avatar i dades -->
        <div class="col-md-4 text-center">
            <img id="avatar-gran" src="{{ asset('storage/' . $user->imatge) }}" alt="Avatar" class="img-fluid shadow" style="width: 200px; height: 200px; object-fit: cover;">

            <div class="mt-4 text-start">
                <h4>Dades personals</h4>
                <p><strong>Nom:</strong> {{ $user->name }}</p>
                <p><strong>Sexe:</strong> {{ $user->sexe }}</p>
                <p><strong>Edat:</strong> {{ \Carbon\Carbon::parse($user->data_naixement)->age }} anys</p>
                <p><strong>Color de cabell:</strong> {{ $user->color_cabell }}</p>
                <p><strong>Color d'ulls:</strong> {{ $user->color_ulls }}</p>

                @if ($isOwnProfile)
                    <a href="{{ route('usuari.editar') }}" class="btn btn-outline-primary mt-2">
                        <i class="bi bi-pencil-square me-1"></i>Editar dades
                    </a>
                @endif
            </div>
        </div>

        <!-- Galeria i preferències -->
        <div class="col-md-8">
            <h4>Fotos</h4>
            <div class="d-flex flex-wrap gap-3 align-items-start">
                @foreach ($user->fotos as $foto)
                    <img src="{{ asset('storage/' . $foto->ruta) }}" alt="Foto" class="rounded shadow" style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;" onclick="canviarAvatar('{{ asset('storage/' . $foto->ruta) }}')">
                @endforeach

                @if ($isOwnProfile)
                    <!-- Botó per anar a la vista de modificar fotos -->
                    <a href="{{ route('user.modificarfotos') }}" class="btn btn-outline-primary d-flex flex-column justify-content-center align-items-center" style="width: 100px; height: 100px;">
                        <i class="bi bi-pencil-square" style="font-size: 1.5rem;"></i>
                        <span class="mt-1" style="font-size: 0.8rem;">Editar</span>
                    </a>
                @endif
            </div>

            <hr class="my-4">

            <h4>Preferències</h4>
            
            @if ($isOwnProfile)
                <!-- Formulari per editar preferències -->
                <form action="{{ route('preferencies') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="edat" class="form-label">Edat preferida</label>
                            <input type="number" name="edat" id="edat" class="form-control" value="{{ old('edat', $user->preference ? $user->preference->edat : '') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="color_cabell" class="form-label">Color de cabell preferit</label>
                            <input type="text" name="color_cabell" id="color_cabell" class="form-control" value="{{ old('color_cabell', $user->preference ? $user->preference->color_cabell : '') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="color_ulls" class="form-label">Color d'ulls preferit</label>
                            <input type="text" name="color_ulls" id="color_ulls" class="form-control" value="{{ old('color_ulls', $user->preference ? $user->preference->color_ulls : '') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Desar preferències</button>
                </form>

            @else
                <!-- Mostrar preferències sense poder editar-les -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <p><strong>Edat preferida:</strong> {{ $user->preference ? $user->preference->edat : 'No especificada' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Color de cabell preferit:</strong> {{ $user->preference ? $user->preference->color_cabell : 'No especificat' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Color d'ulls preferit:</strong> {{ $user->preference ? $user->preference->color_ulls : 'No especificat' }}</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</main>

<script>
    function canviarAvatar(novaRuta) {
        document.getElementById('avatar-gran').src = novaRuta;
    }
</script>
@endsection
