<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->increments('id_amigo');
            $table->integer('id_rescatista')->unsigned();
            $table->foreign('id_rescatista')
                  ->references('id_rescatista')
                  ->on('rescatistas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('nombre');
            $table->string('raza');
            $table->string('tamanio');
            $table->string('caracter');
            $table->string('convivencia');
            $table->string('fotos')->default('default.jpg');
            $table->string('recomendaciones');
            $table->string('requisitos');
            $table->string('otros');
            $table->integer('id_especie')->unsigned();
            $table->foreign('id_especie')
                  ->references('id_especie')
                  ->on('cat_especies')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->boolean('solicita_adopcion')->default(false);
            $table->boolean('solicita_esterilizacion')->default(false);      
            $table->boolean('solicita_hogar_temporal')->default(false);
            $table->boolean('solicita_ayuda_medica')->default(false);
            $table->boolean('solicita_ayuda_alimenticia')->default(false);
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
        Schema::dropIfExists('amigos');
    }
}
