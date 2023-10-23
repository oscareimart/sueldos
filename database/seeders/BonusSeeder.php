<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bonusDefault = [
            [
                'code' => 'BHO',
                'name' => 'Bono Horas Extras',
                'recipe' => '(HBE/CH)*HE*2',
                'description' => 'Creado por Sistema'
            ],
            [
                'code' => 'BRN',
                'name' => 'Bono Recargo Nocturno',
                'recipe' => '(HBE/CH)*HE*0.3',
                'description' => 'Creado por Sistema'
            ],
            [
                'code' => 'BDT',
                'name' => 'Bono Domingos Trabajados',
                'recipe' => '(HBE/26)*DT*3',
                'description' => 'Creado por Sistema'
            ],
        ];
    }
}
