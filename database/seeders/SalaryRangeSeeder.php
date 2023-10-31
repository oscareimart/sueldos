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
                'category' => 'BA'
            ],
            [
                'from' => 2,
                'to' => 5,
                'percentage_value' => 5,
                'category' => 'BA'
            ],
            [
                'from' => 5,
                'to' => 8,
                'percentage_value' => 11,
                'category' => 'BA'
            ],
            [
                'from' => 11,
                'to' => 15,
                'percentage_value' => 26,
                'category' => 'BA'
            ],
            [
                'from' => 15,
                'to' => 20,
                'percentage_value' => 34,
                'category' => 'BA'
            ],[
                'from' => 20,
                'to' => 25,
                'percentage_value' => 42,
                'category' => 'BA'
            ],
            [
                'from' => 25,
                'to' => 99,
                'percentage_value' => 50,
                'category' => 'BA'
            ],
            [
                'from' => 2362,
                'to' => 13000,
                'percentage_value' => 3,
                'category' => 'ANS'
            ],
            [
                'from' => 13000,
                'to' => 25000,
                'percentage_value' => 5,
                'category' => 'ANS'
            ],
            [
                'from' => 25000,
                'to' => 35000,
                'percentage_value' => 7,
                'category' => 'ANS'
            ]
        ];
        foreach ($salaryRangeDefault as $key => $s) {
            SalaryRange::create($s);
        }
    }
}
