<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>HelmetPremiumUy</title>
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <style>

        :root {
            --fondo: #0b0d0f;
            --fondo-card: #15181c;
            --fondo-card-2: #101316;
            --borde: #2a2f35;
            --texto: #f5f5f5;
            --texto-suave: #aeb4bc;
            --amarillo: #f5b800;
            --amarillo-hover: #ffc928;
            --negro: #090a0b;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 85% 10%, rgba(245, 184, 0, 0.08), transparent 28%),
                linear-gradient(180deg, #090b0d 0%, #101316 48%, #0a0c0e 100%);
            color: var(--texto);
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
        }

        /* ENCABEZADO */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            min-height: 76px;
            padding: 14px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: rgba(9, 11, 13, 0.94);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(245, 184, 0, 0.18);
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.8px;
            white-space: nowrap;
        }

        .logo span {
            color: var(--amarillo);
        }

        .acceso {
            position: relative;
        }

        .btn-login {
            background: transparent;
            border: 1px solid #3a3f45;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            padding: 10px 16px;
            border-radius: 999px;
            transition: 0.25s ease;
        }

        .btn-login:hover {
            border-color: var(--amarillo);
            color: var(--amarillo);
            transform: translateY(-1px);
        }

        /* LOGIN */
        .login-container {
            display: none;
            position: absolute;
            right: 0;
            top: 55px;
            width: 320px;
            background: #171a1e;
            padding: 22px;
            border: 1px solid #30363d;
            border-radius: 16px;
            box-shadow: 0 18px 50px rgba(0,0,0,0.65);
            z-index: 9999;
            color: white;
        }

        .login-container h2 {
            margin: 0 0 20px;
            font-size: 22px;
        }

        .login-container label {
            display: block;
            margin-bottom: 6px;
            color: #d7dbe0;
            font-size: 13px;
        }

        .login-container input {
            width: 100%;
            padding: 11px 12px;
            margin-bottom: 15px;
            border: 1px solid #3a4047;
            border-radius: 9px;
            background: #0f1215;
            color: white;
            outline: none;
        }

        .login-container input:focus {
            border-color: var(--amarillo);
            box-shadow: 0 0 0 3px rgba(245,184,0,0.12);
        }

        .btn-entrar {
            background: var(--amarillo);
            color: #111;
            border: none;
            border-radius: 9px;
            padding: 11px;
            width: 100%;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .btn-entrar:hover {
            background: var(--amarillo-hover);
            transform: translateY(-1px);
        }

        .error {
            background: rgba(220, 53, 69, 0.12);
            border: 1px solid rgba(220, 53, 69, 0.4);
            color: #ff9da6;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        /* CONTENEDOR / HERO */
        .contenedor {
            width: min(1400px, 92%);
            margin: 0 auto;
            padding: 52px 0 80px;
        }

        .titulo {
            margin: 0;
            font-size: clamp(38px, 5vw, 68px);
            line-height: 1.02;
            letter-spacing: -2px;
            font-weight: 900;
            max-width: 850px;
        }

        .titulo::first-line {
            color: #fff;
        }

        .subtitulo {
            color: var(--texto-suave);
            font-size: 18px;
            margin: 16px 0 55px;
        }

        /* BOTÓN CARRITO */
        .btn-flotante {
            position: fixed;
            right: 24px;
            bottom: 24px;
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
            background: var(--amarillo);
            border: 2px solid #111;
            border-radius: 50%;
            text-decoration: none;
            font-size: 27px;
            z-index: 9999;
            box-shadow: 0 10px 28px rgba(0,0,0,0.45);
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .btn-flotante:hover {
            background: var(--amarillo-hover);
            transform: scale(1.08) translateY(-2px);
        }

        /* MARCAS */
        .marca-section {
            margin: 0 0 58px;
            padding: 28px;
            border: 1px solid var(--borde);
            border-radius: 22px;
            background: linear-gradient(145deg, rgba(24,28,32,0.96), rgba(13,16,19,0.96));
            box-shadow: 0 16px 45px rgba(0,0,0,0.22);
        }

        .marca-titulo {
            flex-basis: 100%;
            margin: 0 0 24px;
            padding: 0 0 17px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 29px;
            border-bottom: 1px solid #30363d;
        }

        .punto {
            width: 9px;
            height: 30px;
            border-radius: 8px;
            background: var(--amarillo);
            display: inline-block;
            box-shadow: 0 0 18px rgba(245,184,0,0.35);
        }

        /* DOS TARJETAS POR FILA EN ESCRITORIO */
        .marca-section {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
        }

        .modelo-section {
    width: 100%;
    margin: 0;
    padding: 20px;
    background: linear-gradient(145deg, #171b20, #101316);
    border: 1px solid #2d333a;
    border-radius: 18px;
    overflow: hidden;
    transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
}

/* Cuando una marca tiene 2 o más modelos */
.marca-section:has(.modelo-section + .modelo-section) .modelo-section {
    width: calc(50% - 11px);
}
        
        .marca-section > .modelo-section:only-child {
    width: 100%;
}
.marca-section > .modelo-section:only-child .galeria {
    max-width: 950px;
}

        .modelo-section:hover {
            transform: translateY(-4px);
            border-color: rgba(245,184,0,0.55);
            box-shadow: 0 18px 40px rgba(0,0,0,0.35);
        }

        .modelo-titulo {
            margin: 0 0 8px;
            font-size: 24px;
            letter-spacing: -0.4px;
        }

        .precio {
            font-size: 25px;
            font-weight: 900;
            color: var(--amarillo);
            margin: 4px 0 5px;
        }

        .descripcion {
            color: var(--texto-suave);
            font-size: 14px;
            margin-bottom: 14px;
        }

        /* BOTÓN */
        .boton {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin: 0 0 18px;
            padding: 11px 18px;
            border: 1px solid var(--amarillo);
            border-radius: 9px;
            background: var(--amarillo);
            color: #111;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .boton:hover {
            background: var(--amarillo-hover);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(245,184,0,0.18);
        }

        /* GALERÍA */
        .galeria {
            display: flex;
            gap: 12px;
            align-items: stretch;
            width: 100%;
        }

        .miniaturas {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 62px;
            flex-shrink: 0;
        }

        .miniatura {
            width: 62px;
            height: 62px;
            padding: 4px;
            background: #0b0d0f;
            border: 1px solid #30363d;
            border-radius: 10px;
            cursor: pointer;
            object-fit: contain;
            transition: 0.2s ease;
        }

        .miniatura:hover {
            border-color: #777;
            transform: scale(1.03);
        }

        .miniatura.activa {
            border: 2px solid var(--amarillo);
            box-shadow: 0 0 0 2px rgba(245,184,0,0.12);
        }

        .imagen-principal {
            width: calc(100% - 74px);
            height: 430px;
            min-width: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                radial-gradient(circle at center, #242a30 0%, #111417 58%, #090b0d 100%);
            border: 1px solid #2c3238;
            border-radius: 14px;
            overflow: hidden;
        }

        .imagen-grande {
            width: 100% !important;
            height: 100% !important;
            object-fit: contain !important;
            display: block;
            transition: transform 0.25s ease;
        }

        .imagen-principal:hover .imagen-grande {
            transform: scale(1.025);
        }

        /* SEPARADOR */
        .separador {
            height: 1px;
            background: #333;
            margin: 50px 0;
        }

        /* CELULAR */
        @media (max-width: 850px) {
            header {
                padding: 13px 4%;
            }

            .logo {
                font-size: 22px;
            }

            .contenedor {
                width: 94%;
                padding-top: 38px;
            }

            .modelo-section {
                width: 100%;
            }

            .imagen-principal {
                height: 390px;
            }
        }

        @media (max-width: 600px) {
            header {
                min-height: 68px;
            }

            .logo {
                font-size: 19px;
                letter-spacing: -0.5px;
            }

            .btn-login {
                font-size: 12px;
                padding: 8px 11px;
            }

            .login-container {
                width: min(320px, 88vw);
            }

            .contenedor {
                width: 94%;
                padding: 32px 0 65px;
            }

            .titulo {
                font-size: 39px;
                letter-spacing: -1.5px;
            }

            .subtitulo {
                font-size: 15px;
                margin-bottom: 32px;
            }

            .marca-section {
                padding: 17px;
                border-radius: 16px;
            }

            .marca-titulo {
                font-size: 23px;
            }

            .modelo-section {
                padding: 14px;
                border-radius: 14px;
            }

            .modelo-titulo {
                font-size: 21px;
            }

            .precio {
                font-size: 23px;
            }

            .galeria {
                gap: 8px;
            }

            .miniaturas {
                width: 52px;
                gap: 6px;
            }

            .miniatura {
                width: 52px;
                height: 52px;
            }

            .imagen-principal {
                width: calc(100% - 60px);
                height: 310px;
            }

            .btn-flotante {
                width: 52px;
                height: 52px;
                right: 16px;
                bottom: 16px;
            }
        }

    </style>

</head>

<body>

<header>

    <div class="logo">
        Helmet<span>PremiumUy</span>
    </div>

    <div class="acceso">

    <button type="button" class="btn-login" onclick="mostrarLogin()">
        👤 INGRESAR
    </button>

    <div class="login-container" id="loginBox">

        <h2>Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.procesar') }}" method="POST">

            @csrf

            <div>
                <label for="email">Correo</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Ingresa tu correo"
                    required
                >
            </div>

            <div>
                <label for="password">Contraseña</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresa tu contraseña"
                    required
                >
            </div>

            <button type="submit" class="btn-entrar">
                Entrar
            </button>

        </form>

    </div>

</div>

</header>

    <div>

    <a href="{{ route('carrito') }}" class="btn-flotante">🛒</a>

    </div>


    <main class="contenedor">

    <h1 class="titulo">
        Descubrí nuestros cascos
    </h1>

    <p class="subtitulo">
        Catálogo Top 10 Premium
    </p>


  @php

$catalogo = [

    [
        'marca' => 'AGV🇮🇹',
        'modelo' => 'Pista GP RR',
        'precio' => 1699,
        'carpeta' => 'pista_gp_rr',
        
        
        
    ],

    [
        'marca' => 'Arai🇯🇵',
        'modelo' => 'RX-7V EVO',
        'precio' => 1149,
        'carpeta' => 'rx-7v-evo',
    ],

    [
        'marca' => 'Bell🇺🇸',
        'modelo' => 'Race Star Flex DLX',
        'precio' => 999,
        'carpeta' => 'race star dlx',
    ],

    [
        'marca' => 'Bell🇺🇸',
        'modelo' => 'C5',
        'precio' => 1099,
        'carpeta' => 'sch c5',
    ],

    [
        'marca' => 'HJC🇰🇷',
        'modelo' => 'RPHA 1',
        'precio' => 899,
        'carpeta' => 'rpha 1',
    ],

    [
        'marca' => 'LS2🇨🇳',
        'modelo' => 'Thunder GP Pro',
        'precio' => 799,
        'carpeta' => 'ls thunder gp pro',
    ],

    [
        'marca' => 'Nolan🇮🇹',
        'modelo' => 'X-804 RS',
        'precio' => 1049,
        'carpeta' => 'nolan x-804 rs',
    ],

    [
        'marca' => 'Scorpion🇰🇷',
        'modelo' => 'XO-1',
        'precio' => 849,
        'carpeta' => 'scorpion_xo_r1',
    ],

    [
        'marca' => 'Shark🇫🇷',
        'modelo' => 'Aeron GP',
        'precio' => 949,
        'carpeta' => 'aeron gp',
    ],

    [
        'marca' => 'Shoei🇯🇵',
        'modelo' => 'X-SPR Pro',
        'precio' => 1199,
        'carpeta' => 'x-spr-pro',
    ],

];

$marcas = collect($catalogo)->groupBy('marca');

@endphp


@foreach($marcas as $marca => $modelos)

<section class="marca-section">

    <h2 class="marca-titulo">
        <span class="punto"></span>
        {{ $marca }}
    </h2>

@foreach($modelos as $casco)

    <div class="modelo-section">

    <h3 class="modelo-titulo">
        {{ $casco['modelo'] ?? '' }}
    </h3>

    <div class="precio">
        US$ {{ number_format($casco['precio'] ?? 0, 0, ',', '.') }}
    </div>

    <div class="descripcion">
        {{ $casco['descripcion'] ?? 'Casco premium' }}
    </div>
    <form action="{{ route('carrito.agregar') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $marca . '-' . $casco['modelo'] }}">
    <input type="hidden" name="marca" value="{{ $marca }}">
    <input type="hidden" name="modelo" value="{{ $casco['modelo'] }}">
    <input type="hidden" name="precio" value="{{ $casco['precio'] }}">
    <input type="hidden" name="carpeta" value="{{ $casco['carpeta'] }}">

    <button type="submit" class="boton">
        🛒 Agregar al carrito
    </button>
</form>

    @php
        $carpeta = $casco['carpeta'] ?? '';
        $rutaImagenes = public_path('images/cascos/' . $carpeta);

        $imagenes = [];

        if ($carpeta && is_dir($rutaImagenes)) {
            $imagenes = glob(
                $rutaImagenes . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}',
                GLOB_BRACE
            ) ?: [];
        }
    @endphp

    @if(count($imagenes) > 0)

        <div class="galeria">

            {{-- MINIATURAS --}}
            <div class="miniaturas">

                @foreach($imagenes as $indice => $imagen)

                    <img
                        src="{{ asset('images/cascos/' . $carpeta . '/' . basename($imagen)) }}"
                        alt="{{ $casco['modelo'] ?? '' }}"
                        class="miniatura {{ $indice === 0 ? 'activa' : '' }}"
                        data-imagen="{{ asset('images/cascos/' . $carpeta . '/' . basename($imagen)) }}"
                        onclick="cambiarImagen(this)"
                    >

                @endforeach

            </div>

            {{-- IMAGEN GRANDE --}}
            <div class="imagen-principal">

                <img
                    src="{{ asset('images/cascos/' . $carpeta . '/' . basename($imagenes[0])) }}"
                    alt="{{ $casco['modelo'] ?? '' }}"
                    class="imagen-grande"
                >

            </div>

        </div>

 @endif

    </div>

@endforeach

</section>

@endforeach

    </main>

<script>
function cambiarImagen(elemento) {
    const nuevaImagen = elemento.getAttribute('data-imagen');
    const galeria = elemento.closest('.galeria');
    const imagenGrande = galeria.querySelector('.imagen-grande');

    imagenGrande.src = nuevaImagen;

    galeria.querySelectorAll('.miniatura').forEach(function(miniatura) {
        miniatura.classList.remove('activa');
    });

    elemento.classList.add('activa');
}
function mostrarLogin() {
    const login = document.getElementById('loginBox');

    if (login.style.display === 'block') {
        login.style.display = 'none';
    } else {
        login.style.display = 'block';
    }
}
</script>
@if (session('login_requerido'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        mostrarLogin();
    });
</script>
@endif