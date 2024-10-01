<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portion>
 */
class PortionFactory extends Factory
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
                'portion_type' => 'standard',
                'created_at' => now(),
                'updated_at' => now(),
            ];
    }

    public function custom(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'portion_type' => 'custom',
            ];
        })->afterCreating(function (\App\Models\Portion $portion) {
            DB::table('custom_portions')->insert([
                'portion_id' => $portion->id,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            ]);
        });
    }
    }
