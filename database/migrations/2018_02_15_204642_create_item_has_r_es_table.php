<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemHasREsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_has_r_es', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('re_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->string('nota');

            $table->timestamps();

            $table->foreign('re_id')->references('id')->on('r_es');
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
        Schema::dropIfExists('item_has_r_es');
    }
}
