<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('cascos');
});

Route::get('/carrito', function () {
    $carrito = session('carrito', []);

    return view('carrito', compact('carrito'));
})->name('carrito');


/*
|--------------------------------------------------------------------------
| AGREGAR AL CARRITO
|--------------------------------------------------------------------------
*/

Route::post('/carrito/agregar', function (Request $request) {

    // Si no está logueado, vuelve a la página principal
    if (!Auth::check()) {
        return redirect('/')->with('login_requerido', true);
    }

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


/*
|--------------------------------------------------------------------------
| ELIMINAR DEL CARRITO
|--------------------------------------------------------------------------
*/

Route::delete('/carrito/{index}', function ($index) {

    $carrito = session('carrito', []);

    if (isset($carrito[$index])) {

        unset($carrito[$index]);

        session(['carrito' => $carrito]);
    }

    return back();

})->name('carrito.eliminar');


/*
|--------------------------------------------------------------------------
| COMPRAR
|--------------------------------------------------------------------------
*/

Route::post('/carrito/comprar', function (Request $request) {

    $carrito = session('carrito', []);

    if (empty($carrito)) {
        return back();
    }

    // Aquí irá posteriormente la lógica de compra
    // guardar en base de datos, enviar mail, pago, etc.

    session()->forget('carrito');
    Auth::logout();

$request->session()->invalidate();
$request->session()->regenerateToken();

    return redirect('/')->with(
        'mensaje',
        '¡Gracias por tu compra!'
    );

})->name('carrito.comprar');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', function (Request $request) {

    $credenciales = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credenciales)) {

        $request->session()->regenerate();

        return redirect('/')->with(
            'mensaje',
            '¡Bienvenido!'
        );
    }

    return back()
        ->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.',
        ])
        ->withInput();

})->name('login.procesar');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');

})->name('logout');