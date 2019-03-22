<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_municipios', function (Blueprint $table) {
            $table->increments('id_estado_municipio');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')
                  ->references('id_estado')
                  ->on('cat_estados')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('id_municipio')->unsigned();
            $table->string('municipio');
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
        Schema::dropIfExists('cat_municipios');
    }
}
