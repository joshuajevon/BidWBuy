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
        $product_name = $this->faker->randomElement(['Rolex',
        'Patek Philippe',
        'Audemars Piguet',
        'A.Lange & Söhne',
        'Omega',
        'Jaeger-LeCoultre',
        'IWC Schaffhausen',
        'Cartier',
        'Nordgreen',
        'Vacheron Constantin',
        'Montblanc',
        'Chopard',
        'Piaget',
        'Blancpain',
        'Ulysse Nardin',
        'Panerai',
        'Girard-Perregaux',
        'Hublot',
        'Bulgari',
        'NOMOS Glashütte',
        'Vincero',
        'LIV Watches',
        'Breitling',
        'Bremont',
        'TAG Heuer']);
        $slug = Str::slug($product_name,'-');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(10000000,50000000),
            'quantity' => $this->faker->numberBetween(10,50),
            'image' => 'product-1.jpg',
            'category_id' => $this->faker->numberBetween(1,2)
        ];
    }
}
