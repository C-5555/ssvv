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
            $table->string('nombre', 100);
            $table->string('apellido_paterno',50);
            $table->string('apellido_materno',50);
            $table->foreignId('id_departamento');
            $table->string('puesto',50);
            $table->date('fecha_ingreso');
            $table->string('email',50);
            $table->string('rfc',13);
            $table->string('foto')->nullable();
            $table->boolean('status')->default(true); 
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