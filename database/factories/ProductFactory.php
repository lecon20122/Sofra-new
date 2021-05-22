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
                    'https://i.ibb.co/jwnGM79/unnamed.png',
                    'https://i.ibb.co/phcNPmQ/download-grilled-food-png-file-free-transparent-png-images-grilled-food-png-1348-899.png',
                    'https://i.ibb.co/L9WcbrM/cafe-food-png-5-1-Transparent-Images.png',
                ]
            ),
            'price' => $this->faker->numberBetween(100, 150),
            'ready_in' => $this->faker->numberBetween(30, 60),
            'short_description' => $this->faker->sentence(20),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}
