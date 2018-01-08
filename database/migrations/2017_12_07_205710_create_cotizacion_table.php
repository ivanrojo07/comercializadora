<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->nullable()->unsigned();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('cotizacion')->nullable();
            $table->date('fecha')->nullable();
            // Los campos de abajo seran borrados, van en otra tabla
            $table->integer('producto_id')->nullable()->unsigned();
            $table->foreign('producto_id')->references('id')->on('producto');
            $table->decimal('descuento',2,2)->nullable();
            $table->integer('cantidad')->nullable();
            // Hasta aqui el borrado
            $table->softDeletes();
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
        Schema::dropIfExists('cotizacion');
    }
}
