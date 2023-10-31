<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parameter;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paramsDefault = [
            [
                'code' => 'HE',
                'name' => 'Horas Extras',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'HBE',
                'name' => 'Haber Basico Empleado',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'DT',
                'name' => 'Domingos Trabajados',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'DIT',
                'name' => 'Dias Trabajados',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'HRN',
                'name' => 'Horas Recargo Nocturno',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'OD',
                'name' => 'Otros Descuentos',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'FI',
                'name' => 'Fecha Ingreso',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'ANT',
                'name' => 'Anticipos',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'ANS',
                'name' => 'Aporte Nacional Solidario',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'TG',
                'name' => 'Total Ganado',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'TD',
                'name' => 'Total Descuento',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'AT',
                'name' => 'Años Trabajados',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'RS',
                'name' => 'Rango Salarial',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'LP',
                'name' => 'Liquido Pagable',
                'description' => 'Creado por Sistema',
                'category' => 'Variable'
            ],
            [
                'code' => 'CH',
                'name' => 'Cambio Horas',
                'description' => 'Creado por Sistema',
                'category' => 'Variable',
                'value' => 240
            ],
            [
                'code' => 'HBN',
                'name' => 'Haber Basico Nacional',
                'description' => 'Creado por Sistema',
                'category' => 'Variable',
                'value' => 2362
            ]
        ];
        foreach ($paramsDefault as $key => $p) {
            Parameter::create($p);
        }

    }
}
