<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreventivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preventivos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('equipo_id')->unsigned();
            $table->date('fecha_mantenimiento');

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
        Schema::dropIfExists('preventivos');
    }
}
