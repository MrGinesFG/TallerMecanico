<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Servicio;
use App\Models\OrdenTrabajo;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {// 1. Ejecutamos el seeder de usuarios que ya armaron (Admin y Mecánico)
    $this->call(UserSeeder::class);

    // 2. Creamos 5 servicios fijos en el catálogo
    Servicio::factory(5)->create();

    // 3. Creamos 15 clientes, y a cada uno le asignamos 1 o 2 vehículos automáticamente
    Cliente::factory(15)->create()->each(function ($cliente) {
        $vehiculos = Vehiculo::factory(rand(1, 2))->create([
            'cliente_id' => $cliente->id
        ]);

        // 4. A cada vehículo le creamos una orden de trabajo de prueba
        foreach ($vehiculos as $vehiculo) {
            OrdenTrabajo::factory()->create([
                'vehiculo_id' => $vehiculo->id
            ]);
        }
    });
}
}
