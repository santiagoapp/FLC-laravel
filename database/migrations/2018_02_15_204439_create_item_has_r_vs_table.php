<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemHasRVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_has_r_vs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rv_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->string('cantidad');
            $table->string('nota');

            $table->timestamps();

            $table->foreign('rv_id')->references('id')->on('r_vs');
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
        Schema::dropIfExists('item_has_r_vs');
    }
}
