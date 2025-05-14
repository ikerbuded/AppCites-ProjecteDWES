@extends('layouts.plantilla')

@section('titol', 'Fotos del perfil LoveConnect')

@section('contingut')
<div class="container my-4">
    <div class="d-flex justify-content-between">
        <h3>Les meves fotos de perfil</h3> 
        <a class="btn btn-secondary" href="{{ route('usuari.perfil', ['name' => str_replace(' ', '_', Auth::user()->name)]) }}">Tornar al perfil</a>
    </div>

    <div class="row g-3 mt-3">
        @for ($i = 0; $i < 6; $i++)
            <div class="col-md-4 col-6">
                <div class="ranura-foto position-relative border rounded d-flex justify-content-center align-items-center h-300 h-md-400 h-xl-450">
                    @if (!empty($fotos[$i]))
                        <img src="{{ asset('storage/' . $fotos[$i]['ruta']) }}" class="img-fluid h-100 w-100 ajusta-cobertura rounded">
                        
                        <form action="{{ route('user.eliminarfoto', $fotos[$i]['id']) }}" method="POST" class="position-absolute top-0 end-0 m-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-primary bi bi-trash-fill"></button>
                        </form>

                        <form action="{{ route('user.assignaravatar', $fotos[$i]['id']) }}" method="POST" class="position-absolute bottom-0 start-0 m-2">
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto_principal" id="principal{{ $i }}" onchange="this.form.submit()" {{ $fotos[$i]['ruta'] == Auth::user()->imatge ? 'checked' : '' }}>
                                <label class="form-check-label text-white bg-info px-1 rounded" for="principal{{ $i }}">
                                    AVATAR
                                </label>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('user.guardarfoto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="foto{{ $i }}" class="etiqueta-pujar text-center w-100 h-100 d-flex justify-content-center align-items-center cursor-pointer">
                                <span class="display-4 text-secondary">+</span>
                            </label>
                            <input type="file" name="image" id="foto{{ $i }}" class="d-none" onchange="this.form.submit()">
                        </form>
                    @endif
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
