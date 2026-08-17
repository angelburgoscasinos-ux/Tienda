<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casco extends Model
{
    protected $table = 'cascos';

    protected $primaryKey = 'casco_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'marca_id',
        'categoria_id',
        'proveedor_id',
        'modelo',
    ];
}

