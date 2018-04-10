<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correctivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('operario_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->string('estado')->default("Activo");
            $table->string('falla');
            $table->string('causa')->nullable();
            $table->string('observacion')->nullable();
            $table->dateTimeTz('fecha_inicio');
            $table->dateTimeTz('fecha_fin');

            $table->foreign('operario_id')->references('id')->on('operarios');
            $table->foreign('equipo_id')->references('id')->on('equipos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correctivos');
    }
}
