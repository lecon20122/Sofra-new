<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\City::factory(1)->create();
        \App\Models\District::factory(1)->create();
        \App\Models\Restaurant::factory(50)->has(Product::factory()->count(10))->create();
        \App\Models\PaymentTypes::factory(1)->create();
         \App\Models\Setting::factory(1)->create();

    }
}
