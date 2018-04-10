<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {

            $table->increments('id');

            $table->string('nombre');
            $table->string('maquina_id');
            $table->string('ruta_imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado')->nullable()->default('activo');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('factura')->nullable();
            $table->string('corriente')->nullable();
            $table->string('voltaje')->nullable();
            $table->string('procedencia')->nullable();
            $table->boolean('catalogo')->default(false);
            $table->boolean('dibujo')->default(false);
            $table->boolean('diagrama_electrico')->default(false);
            $table->boolean('manual')->default(false);
            $table->string('serie')->nullable();
            $table->dateTimeTz('fecha_compra')->nullable();
            $table->dateTimeTz('fecha_primer_uso')->nullable();
            $table->string('observacion')->nullable();
            $table->string('importancia')->nullable();

            $table->integer('clasificacion_id')->unsigned();
            $table->integer('operario_id')->unsigned();
            $table->integer('zona_id')->unsigned();

            $table->foreign('clasificacion_id')->references('id')->on('clasificacions');
            $table->foreign('operario_id')->references('id')->on('operarios');
            $table->foreign('zona_id')->references('id')->on('zonas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
