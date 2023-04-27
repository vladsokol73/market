<?php

namespace Database\Factories;

use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            "user_id" => User::query()->inRandomOrder()->value("id"),
            "title" => ucfirst($this->faker->words(2, true)),
            'price' => $this->faker->numberBetween(1000, 10000),
            'description' => ucfirst($this->faker->words(5, true)),
            "image" => $this->faker->loremflickr("images"),
            'on_home_page' => $this->faker->boolean(),
            'sorting' => $this->faker->numberBetween(1, 999),
        ];
    }
}
