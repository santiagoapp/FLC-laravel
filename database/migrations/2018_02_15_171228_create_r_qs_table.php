<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_qs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ot_id')->unsigned();
            $table->string('solicita');
            $table->string('autoriza');
            $table->dateTimeTz('fecha_generacion');
            $table->timestampsTz();

            $table->foreign('ot_id')->references('id')->on('o_ts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_qs');
    }
}
