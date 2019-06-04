<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id_solicitud');
            $table->integer('id_amigo')->unsigned();
            $table->foreign('id_amigo')
                  ->references('id_amigo')
                  ->on('amigos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('nombre_solicitante');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('edad');
            $table->text('mensaje');
            $table->boolean('atendida')->default(false);
            $table->string('comentarios_rescatista')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
