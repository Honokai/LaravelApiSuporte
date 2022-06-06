<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocalizacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "identificacao" => $this->faker->text(30)
        ];
    }
}
