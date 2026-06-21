<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@taller.com',
            'password' => bcrypt('password'),
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Mecánico Juan',
            'email' => 'mecanico@taller.com',
            'password' => bcrypt('password'),
            'rol' => 'mecanico',
        ]);
    }
}