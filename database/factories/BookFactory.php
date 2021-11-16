<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => (string) $this->faker->sentence($nbWords = 5),
            'ISBN' => $this->faker->isbn13,
            'description' => $this->faker->sentence,
            'publication_year' => (string) $this->faker->year,
            'price' => $this->faker->randomNumber($nbDigits = 2),
            'in_stock' => $this->faker->boolean($chanceOfGettingTrue = 50)
        ];
    }
}
