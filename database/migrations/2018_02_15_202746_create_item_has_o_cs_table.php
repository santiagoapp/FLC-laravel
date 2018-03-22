<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemHasOCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_has_o_cs', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('oc_id')->unsigned();

            $table->dateTime('fecha');
            $table->string('cantidad');
            $table->morphs('items_doc'); //la clave de todo

            $table->timestamps();
            
            $table->foreign('oc_id')->references('id')->on('o_cs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_has_o_cs');
    }
}
