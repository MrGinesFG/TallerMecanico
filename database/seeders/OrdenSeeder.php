<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use App\Models\OrdenTrabajo;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehiculo = Vehiculo::first();

        OrdenTrabajo::create([
            'vehiculo_id' => $vehiculo->id,
            'descripcion' => 'Cambio de aceite y filtros',
            'fecha_ingreso' => now(),
            'estado' => 'pendiente',    
        ]);
    }
}