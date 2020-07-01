<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesores', function (Blueprint $table) {
            $table->integer('NidAsesor');
            $table->foreign('NidAsesor')->references('Nid_Asesor')->on('users');
            $table->string('StrNombre');
            $table->string('StrApellidos');
            $table->string('StrDNI');
            $table->string('StrAsesoria');
            $table->string('StrDireccion');
            $table->string('StrLocalidad');
            $table->string('StrCP');
            $table->string('StrTelefono');
            $table->string('StrMovil');
            $table->string('StrEmail');
            $table->string('StrNivelEducativo');
            $table->string('StrNRP');
            $table->string('StrEspecialidad');
            $table->string('StrCentroDestino');
            $table->string('StrDireccionCentro');
            $table->string('StrLocalidadCP');
            $table->string('StrTelefonoCentro');
            $table->string('StrFaxCentro');
            $table->string('StrEmailCentro');
            $table->text('TxtObservaciones');
            $table->text('TxtHM');
            $table->text('TxtHT');
            $table->text('TxtMSemanal');
            $table->text('TxtTSemanal');
            $table->char('StrEstado');
            $table->char('StrTipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesores');
    }
}
