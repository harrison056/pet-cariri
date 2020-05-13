<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->string('especie');
            $table->string('pelagem');
            $table->string('cor');
            $table->string('porte');
            $table->string('sexo');
            $table->string('nome');
            $table->string('raca');
            $table->double('peso');
            $table->string('obs')->default("Sem observações");

            $table->integer('cliente_id')->unsigned();

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
        Schema::dropIfExists('animals');
    }
}
