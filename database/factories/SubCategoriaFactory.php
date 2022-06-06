<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoriaFactory extends Factory
{
    public function definition()
    {
        return [
            "nome" => $this->faker->text(rand(5, 30)),
            "categoria_id" => rand(1, Categoria::all()->count())
        ];
    }
}
