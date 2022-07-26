<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros', function (Blueprint $table){
            $table->increments('id');
            $table->string('cod');
            $table->string('name');

            $table->integer('register_id')->unsigned();
            $table->foreign('register_id')->references('id')->on('registers');
            $table->integer('subproyecto_id')->unsigned();
            $table->foreign('subproyecto_id')->references('id')->on('sub_proyectos');
            $table->integer('vigencia_id')->unsigned();
            $table->foreign('vigencia_id')->references('id')->on('vigencias');
            $table->integer('code_contractuales_id')->nullable()->unsigned();
            

            $table->integer('plantilla_cuipos_id')->nullable()->unsigned();
            

            $table->integer('terceros_id')->nullable()->unsigned();
            

            $table->integer('public_politics_id')->nullable()->unsigned();
            

            $table->integer('budget_sections_id')->nullable()->unsigned();
            

            $table->integer('vigencia_gastos_id')->nullable()->unsigned();
            

            $table->integer('sectors_id')->nullable()->unsigned();
            

            $table->integer('fund_situations_id')->nullable()->unsigned();
            

            $table->integer('additional_budget_sections_id')->nullable()->unsigned();
            

            $table->integer('sector_details_id')->nullable()->unsigned();
            

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
        Schema::dropIfExists('rubros');
    }
}
