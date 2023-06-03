<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //categoria : array = ['Deporte', 'Politica', 'Entretenimiento', 'Salud', 'Internacional'];
        
        return [
            "name" => fake()->unique()->word(),
            "description" => fake()->paragraphs(1, true),
        ];
    }
}
