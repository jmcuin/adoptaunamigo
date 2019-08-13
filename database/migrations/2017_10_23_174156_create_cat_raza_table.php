<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatRazaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_razas', function (Blueprint $table) {
            $table->increments('id_raza');
            $table->integer('id_especie')->unsigned();
            $table->foreign('id_especie')
                  ->references('id_especie')
                  ->on('cat_especies')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('raza');
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
        Schema::dropIfExists('cat_raza');
    }
}
