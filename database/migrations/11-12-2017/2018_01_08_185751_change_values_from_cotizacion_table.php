<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeValuesFromCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacion', function (Blueprint $table) {
            
            // $table->dropForeign(['producto_id']);
            // $table->dropColumn('producto_id');
            // $table->dropColumn('descuento');
            // $table->dropColumn('cantidad');
            // $table->string('estado')->default('Incompleto')->after('id');
            // $table->date('validez_cot')->nullable()->after('fecha');
            // $table->decimal('total',8,2)->nullable()->after('validez_cot');
            // $table->renameColumn('cotizacion','cotiza');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizacion', function (Blueprint $table) {
            //
            $table->dropColumn('estado');
            $table->dropColumn('validez_cot');
            $table->dropColumn('total');
        });
    }
}
