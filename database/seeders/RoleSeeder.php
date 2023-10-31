<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesDefault = [
            [
                'name' => 'Admin',
                'description' => 'Administrator'
            ],
            [
                'name' => 'User',
                'description' => 'Users'
            ]
        ];

        foreach ($rolesDefault as $key => $r) {
            $role = Role::create($r);
            if ($key == 0) {
                $role->modules()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);
            }else{
                $role->modules()->sync([1]);
            }

        }


    }
}
