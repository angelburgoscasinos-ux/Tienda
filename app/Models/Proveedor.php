<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $primaryKey = 'proveedor_id';

    public function cascos()
    {
        return $this->hasMany(Casco::class, 'proveedor_id', 'proveedor_id');
    }
}