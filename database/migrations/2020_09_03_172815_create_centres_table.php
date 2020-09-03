<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->integer('codi');
            $table->string('situacio');
            $table->integer('CP');
            $table->string('ciutat');
            $table->string('assesor');
            $table->string('contacte');
            $table->string('mail_contacte');
            $table->integer('tlf_contacte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centres');
    }
}
