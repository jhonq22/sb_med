<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{
    protected $table = 'factura_compras';

    protected $fillable  = [
        'numero_factura',
        'precio_total',
        'codigo_bcv',
        'user_id',
        'cedula_compra',
        'precio',
        'codigo_bcv',
        'observacion'
         ];
}
