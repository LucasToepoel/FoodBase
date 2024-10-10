<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Product;
use App\Models\NutritionDayPlan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,

        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Meal $meal) {
                  // Fetch existing products, you can specify a count or randomize
                  $products = Product::inRandomOrder()->take(rand(1, 3))->pluck('id');
                  // Attach products to the meal via the junction table
                  $meal->products()->attach($products);
        });
    }
}
