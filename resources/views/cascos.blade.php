<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>HelmetPremiumUy</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #111;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ENCABEZADO */

        header {
            padding: 25px 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #333;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .logo span {
            color: #91720e;
            color: #d4af37;
        }

        /* CONTENEDOR */

        .contenedor {
            max-width: 1400px;
            margin: auto;
            padding: 40px 30px;
        }

        .titulo {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .subtitulo {
            color: #aaa;
            margin-bottom: 50px;
        }

        /* MARCA */

        .marca {
            margin-bottom: 60px;
        }

        .marca-titulo {
            font-size: 30px;
            border-bottom: 1px solid #444;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .marca-titulo span {
            color: #d4af37;
        }

        /* MODELOS */

        .modelo {
            margin-bottom: 45px;
        }

        .modelo-titulo {
            font-size: 23px;
            margin-bottom: 18px;
        }

        .modelo-info {
            color: #999;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* FOTOS */

        .fotos {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .foto {
            width: 180px;
            height: 180px;
            background: #222;
            border: 1px solid #444;
            overflow: hidden;
            transition: 0.3s;
        }

        .foto:hover {
            transform: scale(1.04);
            border-color: #d4af37;
        }

        .foto img {
            width: 20%;
            height: 20%;
            object-fit: contain;
        }

        /* SEPARADOR */

        .separador {
            height: 1px;
            background: #333;
            margin: 50px 0;
        }

        /* BOTÓN */

        .boton {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            border: 1px solid #d4af37;
            color: #d4af37;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .boton:hover {
            background: #d4af37;
            color: #111;
        }

        /* CELULAR */

        @media (max-width: 600px) {

            header {
                padding: 20px;
            }

            .contenedor {
                padding: 25px 15px;
            }

            .titulo {
                font-size: 34px;
            }

            .marca-titulo {
                font-size: 25px;
            }

            .foto {
                width: 145px;
                height: 145px;
            }
        }
            /* BOTÓN CARRITO (SIN FONDO) */
    .btn-flotante {
        position: fixed;        
        bottom: 20px;            
        right: 20px;            
        color: white;           
        font-size: 32px;         
        text-decoration: none;   
        z-index: 9999;           
        transition: transform 0.2s ease; /* Transición suave para el zoom */
    }

    /* Efecto al pasar el cursor por encima (Hace zoom fluido) */
    .btn-flotante:hover {
        transform: scale(1.25);     
    }
    </style>

</head>

<body>

<header>

    <div class="logo">
        Helmet<span>PremiumUy</span>
    </div>

    

</header>

    <div>

    <a href="{{ route('carrito') }}" class="btn-flotante">🛒</a>

    </div>

<div class="contenedor">

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
        'carpeta' => 'pista_gp_rr',
    ],

    [
        'marca' => 'Arai🇯🇵',
        'modelo' => 'RX-7V EVO',
        'carpeta' => 'rx-7v-evo',
    ],

    [
        'marca' => 'Bell🇺🇸',
        'modelo' => 'Race Star Flex DLX',
        'carpeta' => 'race star dlx',
    ],

    [
        'marca' => 'Bell🇺🇸',
        'modelo' => 'C5',
        'carpeta' => 'sch c5',
    ],

    [
        'marca' => 'HJC🇰🇷',
        'modelo' => 'RPHA 1',
        'carpeta' => 'rpha 1',
    ],

    [
        'marca' => 'LS2🇨🇳',
        'modelo' => 'Thunder GP Pro',
        'carpeta' => 'ls thunder gp pro',
    ],

    [
        'marca' => 'Nolan🇮🇹',
        'modelo' => 'X-804 RS',
        'carpeta' => 'nolan x-804 rs',
    ],

    [
        'marca' => 'Scorpion🇰🇷',
        'modelo' => 'XO-1',
        'carpeta' => 'scorpion_xo_r1',
    ],

    [
        'marca' => 'Shark🇫🇷',
        'modelo' => 'Aeron GP',
        'carpeta' => 'aeron gp',
    ],

    [
        'marca' => 'Shoei🇯🇵',
        'modelo' => 'X-SPR Pro',
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
            {{ $casco['modelo'] }}
        </h3>

        <div class="casco-contenido">

           <div class="casco-imagen">

    @php
        $imagenes = glob(
            public_path('images/cascos/' . $casco['carpeta'] . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'),
            GLOB_BRACE
        );
    @endphp

    @foreach($imagenes as $imagen)

        <img
            src="{{ asset('images/cascos/' . $casco['carpeta'] . '/' . basename($imagen)) }}"
            alt="{{ $casco['marca'] }} {{ $casco['modelo'] }}"
        >

    @endforeach

</div>

            <div class="casco-info">

                <h4>
                    {{ $casco['marca'] }}
                </h4>

                <p>
                    {{ $casco['modelo'] }}
                </p>

                <a href="#" class="boton">
                    Ver modelo
                </a>

            </div>

        </div>

    </div>

    @endforeach
</section>
<div class="separador"></div>

@endforeach
