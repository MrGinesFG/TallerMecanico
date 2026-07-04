<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajo;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        OrdenTrabajo::create([
            'vehiculo_id' => 1,
            'descripcion' => 'Cambio de aceite y filtros',
            'estado' => 'pendiente',
        ]);
    }
}
