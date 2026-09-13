<?php

namespace App\Http\Controllers;

use App\Models\Casco;

class CascoController extends Controller
{
    public function index()
    {
        $cascos = Casco::with([
            'marca',
            'categoria',
            'proveedor'
        ])->get();

        return view('cascos', compact('cascos'));
    }
}