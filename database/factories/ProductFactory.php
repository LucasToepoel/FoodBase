<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Nutrition;

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
            'nutrition_id' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }

    public function food()
    {
        return $this->afterCreating(function ($product) {
            $nutrition = Nutrition::factory()->create();
            $product->nutrition_id = $nutrition->id;
            $product->save();
        });
    }

}
