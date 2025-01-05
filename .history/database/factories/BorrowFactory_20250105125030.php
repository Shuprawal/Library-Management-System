<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'book_id'=>Book::inRandomOrder()->first()->id,
            'request'=>$this->faker->randomElement(['pending','approved']),
            'status'=>$this->faker->randomElement(['borrowed','returned']),
            'borrow_date'=>now(),
        ];
    }
}
