<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehiculo;
use App\Models\User;
/**
 * @extends Factory<Model>
 */
class OrdenTrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'vehiculo_id' => Vehiculo::factory(),
        'user_id' => User::where('rol', 'mecanico')->inRandomOrder()->first()?->id ?? User::factory(), 
        'descripcion' => fake()->paragraph(),
        'estado' => fake()->randomElement(['pendiente', 'en_proceso', 'terminado']),
        'fecha_ingreso' => fake()->dateTimeBetween('-1 month', 'now'),
        'fecha_entrega' => fake()->optional()->dateTimeBetween('now', '+1 week'),
        'costo_total' => fake()->randomFloat(2, 20000, 150000),
        ];
    }
}
