<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guarantee>
 */
class GuaranteeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isRecent = $this->faker->boolean(); // 50% chance to generate a recent date or older one.

        return [
            'reference' => $this->faker->unique()->word,
            'gift' => $this->faker->boolean(),
            'notes' => $this->faker->optional()->text(),
            'total_amount' => $this->faker->randomFloat(2, 10, 500), // Random amount between 10 and 500
            'cashier_code' => $this->faker->optional()->word,
            'created_at' => $isRecent ? $this->faker->dateTimeThisYear() : $this->faker->dateTimeBetween('-5 years', '-1 day'), // recent or past
            'updated_at' => $isRecent ? $this->faker->dateTimeThisYear() : $this->faker->dateTimeBetween('-5 years', '-1 day'), // recent or past

        ];
    }
}
