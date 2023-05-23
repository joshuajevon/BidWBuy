<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
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
        return [
            'name' => $product_name,
            'description' => $this->faker->text(200),
            'current_price' => $this->faker->numberBetween(10000000,50000000),
            'image' => 'product-1.jpg',
            'end_date' => $this->faker->dateTimeBetween('now', '+1 months')->format('Y-m-d'),
            'category_id' => 2
        ];
    }
}
