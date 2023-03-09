<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->city().', '.$this->faker->state(),
            'password'=>bcrypt('password'),
            'phoneNumber' => $this->faker->phoneNumber(12),
            'projectId' => $this->faker->numberBetween($min = 1, $max = 5),
            'publicationStatus' => 1,
        ];
    }
}
