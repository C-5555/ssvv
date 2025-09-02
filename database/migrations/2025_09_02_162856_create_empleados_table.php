<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre, 100');
            $table->string('Apellido_paterno,50');
            $table->string('Apellido_materno,50');
            $table->foreignId('id_departamento');
            $table->string('Puesto,50');
            $table->date('Fecha_ingreso');
            $table->string('Email,50');
            $table->string('RFC,50');
            $table->file('Foto');
            $table->foreignId('id_solicitud');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
