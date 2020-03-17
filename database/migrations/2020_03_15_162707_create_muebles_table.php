<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('num_factura');
            $table->text('descripcion');
            $table->date('fecha_ing');
            $table->date('fecha_baja');
            $table->enum('estado', [0, 1, 2]);
            $table->integer('avaluo');
            $table->integer('depresiacion');
            $table->integer('nuevo_valor');
            $table->integer('vida_util');

            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');

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
        Schema::dropIfExists('muebles');
    }
}
