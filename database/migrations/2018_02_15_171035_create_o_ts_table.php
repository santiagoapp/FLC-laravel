<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_ts', function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('fecha_impresion');
            $table->dateTime('fecha_recibido_produccion')->nullable();
            $table->string('cliente');
            $table->string('vendedor');
            $table->string('ciudad');
            $table->string('observacion');
            $table->string('transporte');

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
        Schema::dropIfExists('o_ts');
    }
}
