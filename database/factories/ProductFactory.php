<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'merchant_id' => Merchant::factory(1)->create()->first(),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 0, 10),
            'status' => $this->faker->randomElement(['out_of_stock','in_stock','running_low']),
        ];
    }
}
