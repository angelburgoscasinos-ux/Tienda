<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CascoController;

Route::get('/', [CascoController::class, 'index']);
Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');