<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetallesAnulacionAdopciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            //
            $table->text('detalles_anulacion')->after('vigente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            //
            $table->dropColumn('detalles_anulacion');
        });
    }
}
