<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaqItemHasOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maq_item_has_o_s', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('os_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->string('cantidad');
            $table->dateTime('fecha');

            $table->timestamps();
            
            $table->foreign('os_id')->references('id')->on('o_s');
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
        Schema::dropIfExists('maq_item_has_o_s');
    }
}
