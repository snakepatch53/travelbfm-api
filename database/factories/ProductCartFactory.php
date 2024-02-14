<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCart>
 */
class ProductCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "quantity" => $this->faker->numberBetween(1, 5),
            "price" => $this->faker->randomFloat(2, 1, 100),
            "product_id" => Product::factory(),
            "cart_id" => Cart::factory(),
        ];
    }
}
