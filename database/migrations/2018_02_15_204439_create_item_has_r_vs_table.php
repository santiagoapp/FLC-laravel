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
            $table->integer('item_has_ot_id')->unsigned();

            $table->string('cantidad');
            $table->string('nota');

            $table->timestampsTz();

            $table->foreign('rv_id')->references('id')->on('r_vs');
            $table->foreign('item_has_ot_id')->references('item_id')->on('item_has_o_ts');
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
