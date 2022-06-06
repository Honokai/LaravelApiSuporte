<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SetorFactory extends Factory
{
    public function definition()
    {
        return [
            "nome" => $this->faker->text(10, 20)
        ];
    }
}
