<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión - HelmetPremiumUy</title>

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #111;
            font-family: Arial, sans-serif;
            color: white;
        }

        .login {
            width: 350px;
            padding: 30px;
            background: #1b1b1b;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            box-sizing: border-box;
            border: 1px solid #444;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 11px;
            background: #d4af37;
            color: #111;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #f0c94d;
        }

        .error {
            background: #6b2020;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #d4af37;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="login">

        <h1>Iniciar Sesión</h1>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.procesar') }}">

            @csrf

            <label for="email">Correo</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Ingresa tu correo"
                required
            >

            <label for="password">Contraseña</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Ingresa tu contraseña"
                required
            >

            <button type="submit">
                Ingresar
            </button>

        </form>

        <a href="{{ url('/') }}" class="volver">
            Volver al catálogo
        </a>

    </div>

</body>
</html>