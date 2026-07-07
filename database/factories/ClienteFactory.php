<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
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
