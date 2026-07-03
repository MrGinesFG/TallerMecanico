<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nombre' => fake()->firstName(),
        'apellido' => fake()->lastName(),
        'telefono' => fake()->phoneNumber(),
        'email' => fake()->unique()->safeEmail(),
        'direccion' => fake()->address(),
        ];
    }
}
