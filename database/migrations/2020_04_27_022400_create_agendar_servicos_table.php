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

            $table->date('data');
            $table->string('hora');
            $table->string('descricao')->default("Sem descrição");
            $table->string('servico');
            $table->double('preco');

            $table->integer('animal_id')->unsigned();
            $table->integer('user_id');

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
