<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalaryRange;

class SalaryRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaryRangeDefault = [
            [
                'from' => 0,
                'to' => 2,
                'percentage_value' => 0,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 2,
                'to' => 5,
                'percentage_value' => 5,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 5,
                'to' => 8,
                'percentage_value' => 11,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 8,
                'to' => 11,
                'percentage_value' => 18,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 11,
                'to' => 15,
                'percentage_value' => 26,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 15,
                'to' => 20,
                'percentage_value' => 34,
                'category' => "Bono Antiguedad"
            ],[
                'from' => 20,
                'to' => 25,
                'percentage_value' => 42,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 25,
                'to' => 99,
                'percentage_value' => 50,
                'category' => "Bono Antiguedad"
            ],
            [
                'from' => 2362,
                'to' => 13000,
                'percentage_value' => 1,
                'category' => "Aporte Nacional Solidario"
            ],
            [
                'from' => 13000,
                'to' => 25000,
                'percentage_value' => 5,
                'category' => "Aporte Nacional Solidario"
            ],
            [
                'from' => 25000,
                'to' => 35000,
                'percentage_value' => 10,
                'category' => "Aporte Nacional Solidario"
            ]
        ];
        foreach ($salaryRangeDefault as $key => $s) {
            SalaryRange::create($s);
        }
    }
}
