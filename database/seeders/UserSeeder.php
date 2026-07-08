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

        $clienteUser = User::updateOrCreate([
            'email' => 'cliente@taller.com',
        ], [
            'name' => 'Cliente de Prueba',
            'password' => bcrypt('password'),
            'rol' => 'cliente', // It will just insert this string in SQLite
        ]);

        // Link the user to the first client, or create one if none exists
        $cliente = \App\Models\Cliente::first();
        if ($cliente) {
            $cliente->update(['user_id' => $clienteUser->id]);
        }
    }
}