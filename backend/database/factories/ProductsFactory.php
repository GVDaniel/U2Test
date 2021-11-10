<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = [
            'In Stock',
            'Out',
            'To Run Out'
        ];

        $status = $statuses[array_rand($statuses, 1)];
        $stock = "";

        switch ($status) {
            case "In Stock":
                $stock = $this->faker->numberBetween($min = 5, $max = 20);
                break;
            case "Out":
                $stock = 0;
                break;
            case "To Run Out":
                $stock = $this->faker->numberBetween($min = 1, $max = 5);
                break;
        }

        return [
            'name'          => $this->faker->word(),
            'description'   => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'status'        => $status,
            'price'         => $this->faker->randomNumber(6),
            'stock'         => $stock,
            'bar_code'      => $this->faker->randomNumber(7),
            'supplier_id'   => $this->faker->numberBetween($min = 1, $max = 6)
        ];
    }
}
