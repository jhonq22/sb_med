<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
  protected $table = 'empresas';

     protected $fillable  = [
        'nombre_empresa',
        'telefono_empresa',
        'estado_id',
        'direccion',
        'url',
        ];
}
