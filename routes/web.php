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