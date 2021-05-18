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
            'image' => $this->faker->randomElement(
                [

                    'https://freepikpsd.com/wp-content/uploads/2019/10/cafe-food-png-5-1-Transparent-Images.png',
                    'https://lh3.googleusercontent.com/proxy/C5I8avxccEXB08Ohn_PMwzX5eXFgxL697L50Q7P2uY3o11CG7KD3n3I1KCRuKYiZ77e2BssKb6uelRCKiMau2e1FZhUoefV8IA6-IdQ-HCeKllIZGOYD3A',
                    'https://img.pngio.com/download-grilled-food-png-file-free-transparent-png-images-grilled-food-png-1348_899.png',

                ]
            ),
            'price' => $this->faker->numberBetween(100, 150),
            'ready_in' => $this->faker->numberBetween(30, 60),
            'short_description' => $this->faker->sentence(20),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}
