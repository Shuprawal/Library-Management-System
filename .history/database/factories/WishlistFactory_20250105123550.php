<?php

namespace Database\Factories;

use App\Models\Publisher;
use App\Models\Us;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id'=>Publisher::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first->id,
        ];
    }
}
