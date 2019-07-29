<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->integer('id_rescatista') -> unsigned() -> nullable();
            $table->foreign('id_rescatista')
                  ->references('id_rescatista')
                  ->on('rescatistas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('servicio');
            $table->string('descripcion');
            $table->string('precio');
            $table->string('terminos_y_condiciones');
            $table->string('telefono');
            $table->string('email');
            $table->string('enlace_facebook');
            $table->string('foto')->default('public/images/default.jpg');
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
        Schema::dropIfExists('servicios');
    }
}
