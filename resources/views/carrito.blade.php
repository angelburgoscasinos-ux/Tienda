<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Carrito - CascosPremiumUY</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        header {
            background: #111;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .contenedor {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .vacio {
            text-align: center;
            padding: 50px;
            color: #666;
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<header>
    <h1>🏍️ CascosPremiumUY</h1>
</header>

<div class="contenedor">

    <h1>🛒 Carrito de compras</h1>
     @php
    $carrito = session('carrito', []);
@endphp

    @if(count($carrito) === 0)

        <div class="vacio">

            <h2>Tu carrito está vacío</h2>

            <p>Agregá un casco para comenzar tu compra.</p>

            <a href="/" class="volver">
                ← Volver a los cascos
            </a>

        </div>

    @else

        @php
            $total = 0;
        @endphp

        @foreach($carrito as $index => $item)

    @php
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;
    @endphp

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:20px 0;
        border-bottom:1px solid #ddd;
    ">

        <div>
            <h2>{{ $item['marca'] ?? '' }} {{ $item['nombre'] ?? '' }}</h2>
            <p>Precio: <strong>US$ {{ number_format($item['precio'], 0, ',', '.') }}</strong></p>
            <p>Cantidad: {{ $item['cantidad'] }}</p>
        </div>

        <div style="display: flex; align-items: center; gap: 20px;">
            <strong>US$ {{ number_format($subtotal, 0, ',', '.') }}</strong>

            <form action="{{ route('carrito.eliminar', $index) }}" method="POST" style="margin:0;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:none; border:none; cursor:pointer; font-size:18px;" title="Eliminar">
                    🗑️
                </button>
            </form>
        </div>

    </div>

        @endforeach

       <div style="
            text-align:right;
            margin-top:30px;
            font-size:24px;
        ">
            <strong>
                Total:
                US$ {{ number_format($total, 0, ',', '.') }}
            </strong>
        </div>

        <div style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        ">
            <a href="/" class="volver">
                ← Seguir comprando
            </a>

            <!-- Formulario de Compra -->
            <form action="{{ route('carrito.comprar') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" style="
                    padding: 12px 25px;
                    background: #27ae60;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                    cursor: pointer;
                ">
                    Finalizar compra 🛒
                </button>
            </form>
        </div>

    @endif

</div>



</body>
</html>