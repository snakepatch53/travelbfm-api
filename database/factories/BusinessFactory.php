<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "description" => $this->faker->text(40),
            "short_description" => $this->faker->text(20),
            "phone" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "location" => $this->faker->locale(),
            "link" => $this->faker->url(),
            "state" => $this->faker->randomElement(Business::$_STATES),
            "user_id" => User::factory()
        ];
    }
}
