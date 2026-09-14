<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('cascos');
});

Route::get('/carrito', function () {
    $carrito = session('carrito', []);

    return view('carrito', compact('carrito'));
})->name('carrito');

Route::post('/carrito/agregar', function (Request $request) {

    $carrito = session('carrito', []);

    $id = $request->id;

    if (isset($carrito[$id])) {

        $carrito[$id]['cantidad']++;

    } else {

        $carrito[$id] = [
            'id' => $request->id,
            'marca' => $request->marca,
            'nombre' => $request->modelo,
            'precio' => (float) $request->precio,
            'carpeta' => $request->carpeta,
            'cantidad' => 1,
        ];
    }

    session(['carrito' => $carrito]);

    return redirect()->route('carrito');

})->name('carrito.agregar');

Route::delete('/carrito/{index}', function ($index) {
    $carrito = session('carrito', []);

    if (isset($carrito[$index])) {
        unset($carrito[$index]);
        session(['carrito' => $carrito]);
    }

    return back();
})->name('carrito.eliminar');

Route::post('/carrito/comprar', function () {
    $carrito = session('carrito', []);

    if (empty($carrito)) {
        return back();
    }

    // Aquí iría la lógica de tu negocio: guardar en base de datos, 
    // enviar mail de confirmación, redirigir a pasarela de pago, etc.

    // Por ahora, vaciamos el carrito en la sesión
    session()->forget('carrito');

    // Redirigimos a la portada con un mensaje (o a donde prefieras)
    return redirect('/')->with('mensaje', '¡Gracias por tu compra!');
})->name('carrito.comprar');