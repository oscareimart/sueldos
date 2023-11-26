<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = [
            'name' => 'Adminstrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_system' => true,
            'role_id' => 1
        ];
        User::create($newUser);
    }
}
