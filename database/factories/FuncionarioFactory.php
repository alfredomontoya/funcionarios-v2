<?php

namespace Database\Factories;

use App\Models\Gestion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nro' => $this->faker->unique()->numberBetween(1, 9999),
            'ci' => $this->faker->unique()->regexify('[0-9]{7,10}'),
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'cargo' => $this->faker->optional()->jobTitle,
            'edificio' => $this->faker->optional()->company,
            'tipo' => $this->faker->optional()->randomElement(['planta', 'contrato', 'eventual']),
            'responsable' => $this->faker->name,
            'telresponsable' => $this->faker->phoneNumber,
            'estado' => 1,
            'entregado' => $this->faker->boolean(30) ? 1 : 0,
            'gestion_id' => Gestion::all('id')->random(),
        ];
    }
}
