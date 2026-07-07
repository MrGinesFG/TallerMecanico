<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente = Cliente::first();

        Vehiculo::create([
            'cliente_id' => $cliente->id,
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'patente' => 'ABC123',
            'anio' => 2020,
        ]);
    }
}
