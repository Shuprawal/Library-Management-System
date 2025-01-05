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
            'name'=> $this->faker->sentence(3),
            'isbn'=>$this->faker->unique()->isbn10(),
            'description'=>$this->faker->paragraph(),
            'available_copies'=>$this->faker->numberBetween(1,50),
            'image' => $this->faker->imageUrl(),
            'published_date' => $this->faker->date(),
            'total_pages' => $this->faker->numberBetween(100, 1000),
            'language' => $this->faker->,
            'featured' => $this->faker->randomElement(['yes', 'no']),
        ];
    }
}
