<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'product_name' => $this->faker->word(),
            'product_description' => $this->faker->text(),
            'sku' => $this->faker->word(),
            'price' => 10.2,
            'image' => $this->faker->imageUrl(),
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
