<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomPortionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'unit' => $this->faker->lexify('??'),
        'value' => $this->faker->randomFloat(2, 0.1, 100),
        'product_id' => Product::all()->random()->id,
        'user_id' => User::all()->random()->id,
        ];
    }
}
