<?php

use App\Enums\StatusEnum;
use App\Models\Setor;
use App\Models\SubCategoria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('solicitante');
            $table->text('solicitacao');
            $table->enum('status', StatusEnum::getValues())->default(StatusEnum::ABERTO);
            $table->foreignIdFor(Setor::class, 'setorOrigem_id');
            $table->foreignIdFor(SubCategoria::class, 'subcategoria_id');
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
        Schema::dropIfExists('chamados');
    }
}
