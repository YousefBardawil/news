<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_name' => $this->faker->city(),
            'street_name' => $this->faker->streetName(),
            'country_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
