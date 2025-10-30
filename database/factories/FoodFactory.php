<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(5),
            'ingredients' => $this->faker->randomElement(['Sugar', 'Milk', 'Butter', 'Eggs', 'Flour', 'Salt']),
            'created_by' => User::where('role_id', 2)->inRandomOrder()->first()->id,
            'nutrition' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'rating' => $this->faker->randomNumber(1)
        ];
    }
}
