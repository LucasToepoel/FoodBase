<?php

namespace Database\Factories;

use App\Models\Portion;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nutrition>
 */
class NutritionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kcal' => $this->faker->numberBetween(50, 800),
            'fat' => $this->faker->numberBetween(1, 100),
            'carbs' => $this->faker->numberBetween(1, 300),
            'protein' => $this->faker->numberBetween(1, 200),
        ];
    }
}
