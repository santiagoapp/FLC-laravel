<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_cs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rq_id')->unsigned();
            $table->string('proveedor');
            $table->string('pago');
            $table->string('nota');
            $table->dateTime('fecha');
            $table->morphs('oc'); //la clave de todo

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
        Schema::dropIfExists('o_cs');
    }
}
