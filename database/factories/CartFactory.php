<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state' => $this->faker->randomElement(Cart::$_STATES),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'location' => $this->faker->locale(),
            'comment' => $this->faker->text(30),
            'user_id' =>  User::factory()
        ];
    }
}
