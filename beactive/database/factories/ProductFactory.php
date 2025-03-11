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

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Protein Powered Supplement',
            'Gym Equipment',
            'Sport Equipment',
            'Clothing',
            'Accessories',
        ];

        return [
            'name' => $productNames[$this->faker->unique()->numberBetween(0, 4)], // Assign a specific name from the list
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(1, 100),
            'parent_id' => null,
        ];
    }
}
