<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra't a LoveConnect</title>
    <link rel="stylesheet" href="{{ asset('css/journal-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
    <script>
        function mostrarSegonPas() {
            document.getElementById('pas1').classList.add('d-none');
            document.getElementById('pas2').classList.remove('d-none');
        }

        function tornarPrimerPas() {
            document.getElementById('pas2').classList.add('d-none');
            document.getElementById('pas1').classList.remove('d-none');
        }
    </script>
</head>
<body id="welcome">
    <div class="overlay">
        <h1 class="fw-bold text-primary">LoveConnect</h1>
        <p>Completa el teu perfil per començar a conèixer gent! 💕</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- PAS 1 -->
            <div id="pas1">
                <input type="text" name="name" class="form-control mb-3" placeholder="Nom complet" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Correu electrònic" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Contrasenya" required>
                <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Repeteix la contrasenya" required>
                
                <button type="button" class="btn btn-primary w-100" onclick="mostrarSegonPas()">Següent</button>
            </div>

            <!-- PAS 2 -->
            <div id="pas2" class="d-none">
                <input type="date" name="birthdate" class="form-control mb-3" required>

                <select name="gender" class="form-control mb-3" required>
                    <option value="">Sexe</option>
                    <option value="home">Home</option>
                    <option value="dona">Dona</option>
                </select>

                <select name="hair_color" class="form-control mb-3">
                    <option value="">Color de cabell</option>
                    <option value="negre">Negre</option>
                    <option value="castany">Castany</option>
                    <option value="ros">Ros</option>
                    <option value="roig">Roig</option>
                    <option value="gris">Gris</option>
                    <option value="altre">Altres</option>
                </select>

                <select name="eye_color" class="form-control mb-3">
                    <option value="">Color d’ulls</option>
                    <option value="marró">Marró</option>
                    <option value="negre">Negre</option>
                    <option value="blau">Blau</option>
                    <option value="verd">Verd</option>
                    <option value="gris">Gris</option>
                    <option value="altre">Altres</option>
                </select>

                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-secondary w-50" onclick="tornarPrimerPas()">Tornar</button>
                    <button type="submit" class="btn btn-success w-50">Finalitza Registre</button>
                </div>
            </div>
        </form>

        <p class="mt-3"><a href="{{ route('login') }}" class="text-light">Ja tens compte? Inicia sessió</a></p>
    </div>
</body>
</html>
