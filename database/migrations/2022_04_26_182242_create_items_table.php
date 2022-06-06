<?php

use App\Models\Fornecedor;
use App\Models\Localizacao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quantidade');
            $table->string('marca');
            $table->foreignIdFor(Localizacao::class, 'localizacao_id');
            $table->foreignIdFor(Fornecedor::class, 'fornecedor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
