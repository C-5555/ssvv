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
        //
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado');
            $table->enum('motivo', ['vacaciones', 'viaticos']);
            $table->date('fecha_solicitud');
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); 
            $table->date('fecha_status');
            $table->bigInteger('monto_solicitado');
            $table->text('detalles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
