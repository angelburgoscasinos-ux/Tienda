<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CascoController;
use App\Models\Casco;

Route::get('/', [CascoController::class, 'index']);

Route::get('/carrito', function () {
    $carrito = session('carrito', []);

    return view('carrito', compact('carrito'));
})->name('carrito');

Route::post('/carrito/agregar/{casco}', function (Casco $casco) {

    $carrito = session('carrito', []);

    $id = $casco->id;

    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad']++;
    } else {
        $carrito[$id] = [
            'id' => $casco->id,
            'nombre' => $casco->nombre,
            'precio' => $casco->precio,
            'cantidad' => 1,
        ];
    }

    session(['carrito' => $carrito]);

    return redirect()->route('carrito');

})->name('carrito.agregar');