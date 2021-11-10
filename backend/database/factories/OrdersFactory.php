<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $statuses = [
            'to deliver',
            'delivered',
            'expired'
        ];

        $priorities = [
            'urgent',
            'medium',
            'no urgency'
        ];

        $priority = $priorities[array_rand($priorities, 1)];
        $deadline = "";

        switch ($priority) {
            case "urgent":
                $days = $this->faker->numberBetween($min = 0, $max = 3);
                $deadline = Carbon::now()->addDays($days);
                break;
            case "medium":
                $days = $this->faker->numberBetween($min = 5, $max = 10);
                $deadline = Carbon::now()->addDays($days);
                break;
            case "no urgency":
                $days = $this->faker->numberBetween($min = 10, $max = 40);
                $deadline = Carbon::now()->addDays($days);
                break;
        }

        $price = $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100,000,00);

        return [
            'address'           => $this->faker->address(),
            'customer_name'     => $this->faker->name(),
            'customer_phone'    => $this->faker->phoneNumber(),
            'customer_email'    => $this->faker->email(),
            'customer_identification' => $this->faker->randomNumber(8),
            'total'             => $price,
            'sub_total'         => $price,
            'priority'          => $priority,
            'status'            => $statuses[array_rand($statuses, 1)],
            'deadline'          => $deadline,
        ];
    }
}
