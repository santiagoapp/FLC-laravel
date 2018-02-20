<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemHasRQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_has_r_qs', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('rq_id')->unsigned();
            $table->integer('item_id')->unsigned();


            $table->string('cantidad');
            $table->boolean('compra');
            $table->boolean('servicio');
            $table->string('estado');
            $table->dateTime('fecha');

            $table->timestamps();

            $table->foreign('rq_id')->references('id')->on('r_qs');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_has_r_qs');
    }
}
