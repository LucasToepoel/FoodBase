<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
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
            'ean' => $this->faker->ean13(),
            'nutrition_id' => $this->faker->unique()->numberBetween(1, 50),
            'portion_product_id' => null,
            'product_tag_id' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
