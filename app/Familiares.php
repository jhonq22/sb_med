<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiares extends Model
{
    protected $table = 'familiares';

     protected $fillable  = [
        'cedula',
        'nombres',
        'apellidos',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'user_id',
        'saldo'
        ];
}
 
