<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');

            $table->text('descripcion');
            $table->text('unidad');
            $table->integer('valor_unidad');
            $table->integer('valor_final');
            $table->integer('cantidad');
            $table->date('fecha_ing');
            $table->date('fecha_salida');
            
            $table->integer('rubros_puc_id')->unsigned();
            $table->foreign('rubros_puc_id')->references('id')->on('rubros_pucs');

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
        Schema::dropIfExists('inventarios');
    }
}
