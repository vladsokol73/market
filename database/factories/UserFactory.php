<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(8, 30),
            'role' => 'продавец',
            'on_home_page' => $this->faker->boolean(),
            "avatar" => $this->faker->loremflickr("images"),
            'sorting' => $this->faker->numberBetween(1, 999)
        ];
    }
}
