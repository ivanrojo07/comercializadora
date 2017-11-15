<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_fisica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia');
            $table->string('municipio');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('referencia')->nullable();
            $table->string('calle1')->nullable();
            $table->string('calle2')->nullable();
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
        Schema::dropIfExists('direccion_fisica');
    }
}
