<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyingUsersIdToEmpleadoIdColumnToCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacion', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
            $table->dropForeign(['user_id']);
            $table->integer('empleado_id')->nullable()->unsigned()->after('personal_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');
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
            $table->dropForeign(['empleado_id']);
            $table->dropColumn('empleado_id');
        });
    }
}
