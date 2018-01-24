<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_cotizacion', function (Blueprint $table) {
            $table->increments('id');
            // agrega el id de la cotización
            $table->integer('cotizacion_id')->unsigned();
            // ASIGNANDO LLAVE FORANEA A COTIZACIÓN
            $table->foreign('cotizacion_id')->references('id')->on('cotizacion');
            // agrega productos
            $table->integer('producto_id')->nullable()->unsigned();
            // ASIGNANDO LLAVE FORANEA A PRODUCTO:ID
            $table->foreign('producto_id')->references('id')->on('producto');
            // Descuento de cada producto
            $table->decimal('descuento_prod',4,2)->default(0.00);
            $table->integer('cantidad')->default(1);
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
        Schema::dropIfExists('in_cotizacion');
    }
}
