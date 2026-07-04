<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Juan Pérez',
            'telefono' => '3704000000',
            'email' => 'juan@gmail.com'
        ]);
    }
}