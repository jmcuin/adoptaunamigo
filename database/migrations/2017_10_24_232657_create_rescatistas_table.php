<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRescatistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescatistas', function (Blueprint $table) {
            $table->increments('id_rescatista');
            $table->string('nombre');
            $table->string('a_paterno');
            $table->string('a_materno')->nullable();
            $table->string('alias')->unique();
            $table->string('redes_sociales')->unique();
            $table->integer('id_estado_municipio')->unsigned();      
            $table->foreign('id_estado_municipio')
                  ->references('id_estado_municipio')
                  ->on('cat_municipios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('extranjero')->nullable();      
            $table->string('calle')->nullable();
            $table->string('numero_interior')->nullable();
            $table->string('numero_exterior')->nullable();
            $table->string('colonia')->nullable();
            $table->mediumInteger('cp')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('fotos')->default('default.jpg');
            $table->boolean('es_asociacion')->default(false);
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
        Schema::dropIfExists('rescatistas');
    }
}
