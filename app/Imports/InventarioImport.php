<?php

namespace App\Imports;

use App\ConvocadosPatrias;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class InventarioImport implements ToModel, WithStartRow
{
    
    public function model(array $row)
    {
        return new ConvocadosPatrias([
            'tipo_identificacion'     => $row[0],
            'cedula'    => $row[1],
            'nombres'  => $row[2],
            'fecha_nacimiento'  => $row[3],
            'edad'  => $row[4],
            'telefono'    => $row[5],
            'direccion'    => $row[6],
            'estado_id' => request()->get('estado_id'),
            'municipio_id' => request()->get('municipio_id'),
            'centro_salud_id' => request()->get('centro_salud_id'),
            'grupo_especial_id' => request()->get('grupo_especial_id'),
            'user_id' => request()->get('user_id'),
            'estatu_convocado_id' => request()->get('estatu_convocado_id'),
                  
        ]);
    }


     public function startRow(): int
    {
        return 2;
    }
}


