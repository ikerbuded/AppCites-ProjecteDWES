@extends('layouts.plantilla')

@section('titol', 'Editar dades - LoveConnect')

@section('contingut')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Editar dades personals</h3>
        <a class="btn btn-secondary" href="{{ route('usuari.perfil', ['name' => str_replace(' ', '_', Auth::user()->name)]) }}">Tornar al perfil</a>
    </div>

    <form action="{{ route('usuari.update', ['id' => Auth::user()->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuari->name) }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="data_naixement" class="form-label">Data de naixement</label>
                <input type="date" name="data_naixement" id="data_naixement" class="form-control" value="{{ old('data_naixement', $usuari->data_naixement) }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe" class="form-select">
                    <option value="">Escollir...</option>
                    <option value="home" @if(old('sexe', $usuari->sexe) == 'home') selected @endif>Home</option>
                    <option value="dona" @if(old('sexe', $usuari->sexe) == 'dona') selected @endif>Dona</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="color_cabell" class="form-label">Color de cabell</label>
                <select name="color_cabell" id="color_cabell" class="form-select">
                    <option value="">Escollir...</option>
                    <option value="negre" @if(old('color_cabell', $usuari->color_cabell) == 'negre') selected @endif>Negre</option>
                    <option value="castany" @if(old('color_cabell', $usuari->color_cabell) == 'castany') selected @endif>Castany</option>
                    <option value="ros" @if(old('color_cabell', $usuari->color_cabell) == 'ros') selected @endif>Ros</option>
                    <option value="roig" @if(old('color_cabell', $usuari->color_cabell) == 'roig') selected @endif>Roig</option>
                    <option value="gris" @if(old('color_cabell', $usuari->color_cabell) == 'gris') selected @endif>Gris</option>
                    <option value="altre" @if(old('color_cabell', $usuari->color_cabell) == 'altre') selected @endif>Altres</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="color_ulls" class="form-label">Color d'ulls</label>
                <select name="color_ulls" id="color_ulls" class="form-select">
                    <option value="">Escollir...</option>
                    <option value="marró" @if(old('color_ulls', $usuari->color_ulls) == 'marró') selected @endif>Marró</option>
                    <option value="negre" @if(old('color_ulls', $usuari->color_ulls) == 'negre') selected @endif>Negre</option>
                    <option value="blau" @if(old('color_ulls', $usuari->color_ulls) == 'blau') selected @endif>Blau</option>
                    <option value="verd" @if(old('color_ulls', $usuari->color_ulls) == 'verd') selected @endif>Verd</option>
                    <option value="gris" @if(old('color_ulls', $usuari->color_ulls) == 'gris') selected @endif>Gris</option>
                    <option value="altre" @if(old('color_ulls', $usuari->color_ulls) == 'altre') selected @endif>Altres</option>
                </select>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Desar canvis</button>
        </div>
    </form>
</div>
@endsection
