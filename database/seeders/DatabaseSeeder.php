<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Servicio;
use App\Models\OrdenTrabajo;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {// 1. Ejecutamos el seeder de usuarios que ya armaron (Admin y Mecánico)
        $this->call([
            ClienteSeeder::class,
            VehiculoSeeder::class,
            OrdenSeeder::class,
            UserSeeder::class,
        ]);

        // 2. Creamos 20 servicios fijos en el catálogo
        Servicio::factory(20)->create();

        // 3. Creamos 40 clientes, y a cada uno le asignamos entre 1 y 3 vehículos automáticamente
        Cliente::factory(40)->create()->each(function ($cliente) {
            $vehiculos = Vehiculo::factory(rand(1, 3))->create([
                'cliente_id' => $cliente->id
            ]);

            // 4. A cada vehículo le creamos entre 1 y 4 órdenes de trabajo de prueba
            foreach ($vehiculos as $vehiculo) {
                OrdenTrabajo::factory(rand(1, 4))->create([
                    'vehiculo_id' => $vehiculo->id
                ]);
            }

            //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
            //]);
        });
    }
}
