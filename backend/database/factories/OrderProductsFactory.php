<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id'      => $this->faker->numberBetween($min = 1, $max = 15),
            'product_id'    => $this->faker->numberBetween($min = 1, $max = 100),
        ];
    }
}
