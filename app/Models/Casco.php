<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Proveedor;
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
        'precio',
        'descripcion',
        
    ];

public function marca()
{
    return $this->belongsTo(Marca::class, 'marca_id', 'marca_id');
}

public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
}

public function proveedor()
{
    return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
}
}