<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->word($nb=6,$asText = true);
        $slug = Str::slug($product_name,'-');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(10,500),
            'quantity' => $this->faker->numberBetween(10,50),
            'image' => 'product-'.$this->faker->numberBetween(1,16),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
