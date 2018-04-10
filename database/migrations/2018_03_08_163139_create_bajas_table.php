<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bajas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('autoriza_id')->unsigned();
            $table->string('motivo');
            $table->integer('equipo_id')->unsigned();
            
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('autoriza_id')->references('id')->on('operarios');

            $table->timestampsTz();
        }); 
    }
// Marzo2018
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bajas');
    }
}
