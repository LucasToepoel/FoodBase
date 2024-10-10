<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NutritionDayPlan;
use App\Models\Meal;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class NutritionDayPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
        'date' => $this->faker->unique()->dateTimeThisMonth(),//->format('Y-m-d'),
        'user_id' => 11,

        ];
    }
    public function configure()
    {

        return $this->afterCreating(function (NutritionDayPlan $nutritionDayPlans) {
        $meals = Meal::factory()->count(3)->create();
            $nutritionDayPlans->meals()->attach($meals);
        });

    }
}
