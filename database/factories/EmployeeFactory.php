<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class EmployeeFactory extends Factory
{

    protected $model = Employee::class;

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
            'designationId' => $this->faker->numberBetween($min = 1, $max = 5),
            'phoneNumber' => $this->faker->phoneNumber(12),
            'nid' => 'NID'.$this->faker->phoneNumber(7),
            'projectId' => $this->faker->numberBetween($min = 1, $max = 5),
            'salary' => $this->faker->numberBetween($min = 5000, $max = 20000),
        ];
    }
}
