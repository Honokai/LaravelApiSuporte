<?php

namespace Database\Factories;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChamadoFactory extends Factory
{
    public function definition()
    {
        return [
            "solicitante" => $this->faker->name,
            "solicitacao" => $this->faker->text(100),
            "setorOrigem_id" => rand(1, Setor::all()->count()),
        ];
    }
}
