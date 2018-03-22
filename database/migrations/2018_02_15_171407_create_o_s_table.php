<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rq_id')->unsigned();

            $table->string('proveedor');
            $table->string('pago');
            $table->string('nota');
            $table->dateTime('fecha');
            $table->timestamps();

            $table->foreign('rq_id')->references('id')->on('r_qs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('o_s');
    }
}
