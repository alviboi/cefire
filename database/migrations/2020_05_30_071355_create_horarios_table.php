<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->integer('NidAsesor');
            $table->integer('NidSemana');
            $table->integer('NidAnyo');
            $table->text('TxtManyanaL');
            $table->text('TxtTardeL');
            $table->text('TxtManyanaM');
            $table->text('TxtTardeM');
            $table->text('TxtManyanaX');
            $table->text('TxtTardeX');
            $table->text('TxtManyanaJ');
            $table->text('TxtTardeJ');
            $table->text('TxtManyanaV');
            $table->text('TxtTardeV');
            $table->text('TxtManyanaS');
            $table->text('TxtTardeS');
            $table->text('TxtManyanaD');
            $table->text('TxtTardeD');
            $table->text('TxtObservaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
