<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateREsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_es', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('ot_id')->unsigned();
            $table->string('proveedor');
            $table->dateTimeTz('fecha');
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
        Schema::dropIfExists('r_es');
    }
}
