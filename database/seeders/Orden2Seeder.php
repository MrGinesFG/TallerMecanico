<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrdenTrabajo;

class Orden2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdenTrabajo::create([
            'vehiculo_id' => 1,
            'estado' => 'pendiente',
        ]);
    }
}
