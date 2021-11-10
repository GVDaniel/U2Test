<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuppliersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name(),
            'email'       => $this->faker->email(),
            'address'     => $this->faker->address(),
            'phone'       => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph($nbSentences = 2, $variableNbSentences = true)
        ];
    }
}
