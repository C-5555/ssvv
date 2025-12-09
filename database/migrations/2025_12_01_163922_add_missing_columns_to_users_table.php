<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar name
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name')->after('rfc')->nullable();
            }
            
            // Agregar password_confirmation
            if (!Schema::hasColumn('users', 'password_confirmation')) {
                $table->string('password_confirmation')->after('password')->nullable();
            }
            
            // Agregar id_rol
            if (!Schema::hasColumn('users', 'id_rol')) {
                $table->foreignId('id_rol')->nullable()->after('password_confirmation');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'password_confirmation', 'id_rol']);
        });
    }
};