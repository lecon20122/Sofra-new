<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber,
            'password' => bcrypt($this->faker->password(8 , 10)),
            'image' => 'https://i.pinimg.com/736x/55/f8/af/55f8afd0d4c2224653f1ba467b6543e8.jpg',
            'address' => $this->faker->address,
            'delivery_fees' => $this->faker->numberBetween(10,20),
            'min_order' => $this->faker->numberBetween(100, 150),
            'is_approved' => 1 ,
        ];
    }
}
