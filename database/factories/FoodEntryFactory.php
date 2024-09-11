<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FoodEntryFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'calories' => $this->faker->numberBetween(50, 1000),
            'protein' => $this->faker->numberBetween(1, 100),
            'carbs' => $this->faker->numberBetween(1, 100),
            'fat' => $this->faker->numberBetween(1, 100),
            'ean' => $this->faker->ean13(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
