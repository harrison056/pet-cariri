<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendarServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendar_servicos', function (Blueprint $table) {
            $table->id();

            $table->string('data');
            $table->string('hora');
            $table->string('descricao')->default("Sem descrição");

            $table->integer('servico_id')->unsigned();
            $table->integer('animal_id')->unsigned();
            $table->string('user_id');

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
        Schema::dropIfExists('agendar_servicos');
    }
}
