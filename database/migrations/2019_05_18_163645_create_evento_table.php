<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id_evento');
            $table->integer('id_rescatista')->unsigned();
            $table->foreign('id_rescatista')
                  ->references('id_rescatista')
                  ->on('rescatistas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('imagen')->default('default.jpg');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('lugar');
            $table->date('fecha');
            $table->string('hora');
            $table->string('enlace_facebook');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
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
        Schema::dropIfExists('evento');
    }
}
