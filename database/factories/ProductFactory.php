<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    // https://fakerphp.github.io/formatters/text-and-paragraphs/

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'categoryId' => $this->faker->numberBetween($min = 1, $max = 5),
            'manufacturerId' => $this->faker->numberBetween($min = 1, $max = 5),
            'projectId' => $this->faker->numberBetween($min = 1, $max = 5),
            'productCode' => $this->faker->ean8(),
            'purchasePrice' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'salesPrice' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'productQuantity' => $this->faker->numberBetween($min = 20, $max = 100),
            'details' => $this->faker->sentence(45),
            'publicationStatus' => 1,
        ];
    }
}
