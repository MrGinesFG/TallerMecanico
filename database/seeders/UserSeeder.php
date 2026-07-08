<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@taller.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'rol' => 'admin',
        ]);

        User::updateOrCreate([
            'email' => 'mecanico@taller.com',
        ], [
            'name' => 'Mecánico Juan',
            'password' => bcrypt('password'),
            'rol' => 'mecanico',
        ]);
    }
}