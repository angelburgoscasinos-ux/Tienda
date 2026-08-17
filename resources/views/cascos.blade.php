<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascos Premium UY</title>
</head>

<body>

    <h1>Cascos Premium UY</h1>

    @foreach ($cascos as $casco)

        <div>
            <h2>{{ $casco->modelo }}</h2>
            <p>SKU: {{ $casco->sku }}</p>
        </div>

        <hr>

    @endforeach

</body>
</html>