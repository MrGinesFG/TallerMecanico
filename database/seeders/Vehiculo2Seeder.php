<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class Vehiculo2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::create([
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'patente' => 'ABC123'
        ]);
    }
}
