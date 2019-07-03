<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdopcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopciones', function (Blueprint $table) {
            $table->increments('id_adopcion');
            $table->integer('id_amigo')->unsigned();
            $table->foreign('id_amigo')
                  ->references('id_amigo')
                  ->on('amigos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('id_solicitud')->unsigned()->nullable();
            $table->foreign('id_solicitud')
                  ->references('id_solicitud')
                  ->on('solicitudes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('nombre_adoptante');
            $table->string('direccion_adoptante');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('detalles_adopcion');
            $table->string('evidencias')->nullable();
            $table->boolean('vigente')->default(true);
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
        Schema::dropIfExists('adopciones');
    }
}
