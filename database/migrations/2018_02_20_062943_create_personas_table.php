<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
    /*
        personas relacionadas en cada uno de los procesos. 
    */
class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    public function up()
    {
        
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->bigInteger('num_dc')->unique();
            $table->string('email')->unique();
            $table->string('direccion', 200);
            $table->enum('tipo', ['NATURAL', 'JURIDICA']);
            $table->bigInteger('telefono');
            $table->enum('declarante', ['1', '0']);
            $table->enum('tipo_cc', ['NIT', 'CC']);
            $table->string('ciudad')->nullable();
            $table->string('regimen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('personas');
    }
}
