<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extravios', function (Blueprint $table) {
            $table->increments('id_extravio');
            $table->string('nombre');
            $table->date('ultimo_avistamiento_fecha');
            $table->string('ultimo_avistamiento_lugar');
            $table->string('descripcion_amigo');
            $table->string('senias_particulares');
            $table->string('descripcion_evento');
            $table->string('contacto_persona');
            $table->string('telefono');
            $table->string('email');
            $table->boolean('recompenza');
            $table->string('recompenza_monto');
            $table->string('fotos')->default('public/images/default.jpg');
            $table->string('codigo_desactivacion');
            $table->boolean('activo')->default(true);
            $table->string('conclusion');
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
        Schema::dropIfExists('extravios');
    }
}
