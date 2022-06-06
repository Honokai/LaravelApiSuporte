<?php

namespace Database\Factories;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome" => $this->faker->text(rand(5, 30)),
            "setor_id" => rand(1, Setor::all()->count())
        ];
    }
}
