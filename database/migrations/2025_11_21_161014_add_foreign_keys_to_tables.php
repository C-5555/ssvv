<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /* public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign('id_area')->references('id')->on('area');
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });

        Schema::table('solicitud', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });

        Schema::table('historial', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });
    }

    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign(['id_area']);
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_empleado']);
        });

        Schema::table('solicitud', function (Blueprint $table) {
            $table->dropForeign(['id_empleado']);
        });

        Schema::table('historial', function (Blueprint $table) {
            $table->dropForeign(['id_empleado']);
        });
    } */
};