<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partida>
 */
class PartidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $maxUserId = User::max('id');
        $maxCategoriaId = Categoria::max('id');
        return [
            'aciertos' => fake()->numberBetween(0, 10),
            'cant_preguntas' => 10,
            'tiempo' => fake()->time('H:i:s'),
            'puntuacion' => fake()->numberBetween(0, 1000000),
            'categoria_id' => fake()->numberBetween(1, $maxCategoriaId),
            'user_id' => fake()->numberBetween(1, $maxUserId),
        ];
    }
}
