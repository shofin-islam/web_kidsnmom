<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Manufacturer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    
    protected $model = Manufacturer::class;

    public function definition()
    {
            return [
                'manufacturerName' => $this->faker->words(1, true),
                'projectId' => $this->faker->numberBetween($min = 1, $max = 5),
                'manufacturerDescription' => $this->faker->sentence(45),
                'publicationStatus' => 1,
            ];
    }
}
