<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gestion>
 */
class GestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all('id')->random(), // asegúrate de tener el factory de User
            'year' => (string) $this->faker->year,
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph,
            'url_file' => $this->faker->optional()->url,
            'count_funcionarios' => $this->faker->numberBetween(0, 100),
            'procesado' => $this->faker->boolean,
            'estado' => 1,
        ];
    }
}
