<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a LoveConnect</title>
    <link rel="stylesheet" href="{{ asset('css/journal-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
</head>
<body id="welcome">
    <div class="overlay">
        <h1 class="fw-bold text-primary">LoveConnect</h1>
        <p>Troba persones amb qui connectar, comparteix emocions i viu noves experiències ❤️</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="email" name="email" class="form-control mb-3" value="{{ old('email') }}" placeholder="Correu electrònic" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Contrasenya" required>
            <button type="submit" class="btn btn-primary w-100">Inicia Sessió</button>
        </form>
        <p class="mt-3"><a href="{{ route('register') }}" class="text-light">Encara no tens compte? Registra't</a></p>
    </div>
</body>
</html>
