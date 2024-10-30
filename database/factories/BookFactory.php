<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $this->faker->name, // Generar un título de libro
        'isbn' => $this->faker->isbn13, // Generar un ISBN válido
        'genre_id' => $this->faker->numberBetween(1,6), // Seleccionar un género existente al azar
        'pages' => $this->faker->numberBetween(50, 1000), // Generar un número de páginas entre 100 y 1000
        'image_path' => $this->faker->imageUrl(640, 480, 'books', true, 'Faker'), // Generar una URL de imagen ficticia
        ];
    }
}
