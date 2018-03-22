<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasHasPreventivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_has_preventivos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('pregunta_id')->unsigned();
            $table->integer('preventivo_id')->unsigned();
            $table->string('respuesta');

            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('preventivo_id')->references('id')->on('preventivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas_has_preventivos');
    }
}
