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
            $table->date('dias_solicitados');
            $table->boolean('status')->default(true); 
            $table->date('fecha_status');
            $table->foreignId('id_motivo');
            $table->bigInteger('monto_solicitado');
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
