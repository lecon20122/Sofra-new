<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'image' => 'https://lh3.googleusercontent.com/proxy/EIZLi_D_rFGMeRraEGPoOcSgDMm_nfYk8-ozB_C3_SZJLTtSndG4xItDvs-_CUAq6WgSeFstcFpItxq_6rr12gwpb4c3-RSRBCN20f3f9ocT6aGe6bmM4jlLeDUL1fv6',
            'price' => $this->faker->numberBetween(100, 150),
            'ready_in' => $this->faker->numberBetween(30, 60),
            'short_description' => $this->faker->sentence(20),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}
