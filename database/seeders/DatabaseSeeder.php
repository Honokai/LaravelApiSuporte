<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Chamado;
use App\Models\Localizacao;
use App\Models\Setor;
use App\Models\SubCategoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        // Setor::factory()->count(10)->create();
        Categoria::factory()->count(20)->create();
        SubCategoria::factory()->count(40)->create();
        Localizacao::factory()->count(20)->create();
        // Chamado::factory()->count(10)->create();
    }
}
