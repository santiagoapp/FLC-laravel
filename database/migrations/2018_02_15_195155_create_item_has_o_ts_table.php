<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemHasOTsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_has_o_ts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('ot_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('cantidad');
            $table->dateTimeTz('fecha_entrega');

            $table->foreign('ot_id')->references('id')->on('o_ts');
            $table->foreign('item_id')->references('id')->on('items');

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_has_o_ts');
    }
}
