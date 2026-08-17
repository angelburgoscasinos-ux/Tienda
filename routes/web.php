<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CascoController;

Route::get('/', [CascoController::class, 'index']);