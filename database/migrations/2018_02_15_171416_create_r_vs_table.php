<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_vs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ot_id')->unsigned();
            $table->dateTime('expedicion');
            $table->dateTime('vencimiento');

            $table->timestamps();

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
        Schema::dropIfExists('r_vs');
    }
}
