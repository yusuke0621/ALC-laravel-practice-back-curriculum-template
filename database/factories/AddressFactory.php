<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => optional(User::inRandomOrder()->first())->id ?? User::factory()->id,
            'name' => $this->faker->name(),
            'postal_code' => $this->faker->postalcode(),
            'prefecture' => $this->faker->prefecture(),
            'address_line_1' => $this->faker->city(),
            'address_line_2' => $this->faker->streetAddress(),
        ];
    }
}
