<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordencompra extends Model
{

    protected $table = 'orden_compra';

    protected $fillable  = [
        'producto_id',
        'estatu_id',
        'cedula_compra',
        'user_id',
        'cantidad',
        'precio',
        'codigo_bcv',
         ];
}
