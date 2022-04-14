<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(0, 10),
            'order_id' => Order::factory(1)->create()->first(),
            'product_id' => Product::factory(1)->create()->first(),
        ];
    }
}
