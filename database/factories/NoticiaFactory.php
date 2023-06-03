<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categoria;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created = fake()->dateTimeBetween('-2 years');
        return [
            "titulo" => fake()->unique()->sentence,
            "cuerpo" => fake()->paragraphs(3, true),
            "imagen" => fake()->optional()->imageUrl(225, 225),
            'created_at' => $created,
            'updated_at' => fake()->dateTimeBetween($created),
            "autor" => User::all()->random()->id,
            "categoria" => Categoria::all()->random()->id,
        ];
    }
}
