<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    protected $primaryKey = 'marca_id';

    public $incrementing = true;

    protected $keyType = 'int';
}