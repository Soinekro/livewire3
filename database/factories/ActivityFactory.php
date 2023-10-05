<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 11),
            'proyect_id' => $this->faker->numberBetween(1, 10),
            'sprint' => rand(1, 5),
            'hours' => rand(1, 4),
            'status' => $this->faker->randomElement(['created', 'started', 'finished', 'canceled']),
        ];
    }
}
