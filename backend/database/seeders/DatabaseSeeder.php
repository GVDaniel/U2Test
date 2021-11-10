<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Suppliers::factory(6)->create();
        \App\Models\Products::factory(100)->create();
        \App\Models\Orders::factory(15)->create();
        \App\Models\OrderProducts::factory(200)->create();
    }
}
