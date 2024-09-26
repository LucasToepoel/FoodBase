<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
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
            'description' => $this->faker->sentence(6),
            'color' => $this->faker->hexColor,
            'type' => $this->faker->randomElement(['allergy', 'diet', 'lifestyle']),
            'icon' => base64_encode($this->faker->image(null, 640, 480, null, true))

        ];
    }
}
