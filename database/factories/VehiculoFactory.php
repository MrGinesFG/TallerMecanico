<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(), // Crea un cliente automáticamente si no existe uno
        'marca' => fake()->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Fiat', 'Volkswagen', 'Renault']),
        'modelo' => fake()->randomElement(['Corolla', 'Fiesta', 'Cruze', 'Cronos', 'Gol', 'Clio']),
        'anio' => fake()->numberBetween(2010, 2025),
        'patente' => strtoupper(fake()->bothify('?? ### ??')), // Ejemplo: AA 123 BB
        'color' => fake()->safeColorName(),
        ];
    }
}
