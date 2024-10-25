<?php

namespace Database\Factories;
use App\Models\Book;

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
                'title' => $this->faker->sentence, 
                'author' => $this->faker->name,
                'isbn' => $this->faker->isbn13,
                'stock' => $this->faker->numberBetween(0, 200), 
                'price' => $this->faker->randomFloat(2, 5, 200), 
            ];

    }
}
