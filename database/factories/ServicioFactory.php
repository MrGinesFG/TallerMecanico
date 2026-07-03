<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->randomElement(['Cambio de Aceite', 'Alineación y Balanceo', 'Cambio de Pastillas de Freno', 'Revisión Eléctrica', 'Service Completo']),
        'descripcion' => fake()->sentence(),
        'precio_base' => fake()->randomFloat(2, 15000, 80000),
        ];
    }
}
