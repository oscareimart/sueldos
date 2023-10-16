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
