<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Super Admin
        Role::create(['name' => RoleEnum::SuperAdmin, 
                      'guard_name' => "web"])
            ->detail()
            ->create([
                'short_description' => 'Role de Super Admin',
                'long_description' => 'Rol que permite hacer absolutamente todo dentro del sistema.',
                'ki_icon' => 'ki-setting'
            ]);
        //Invitado 
        Role::create(['name' => RoleEnum::Usuario, 
                      'guard_name' => "web"])
            ->detail()
            ->create([
                'short_description' => 'Persona responsable que debe rendir cuentas y garantizar que el cambio es adecuado para el propósito',
                'long_description' => 'Es la persona responsable final (que debe rendir cuentas) y garantizar que el cambio es adecuado para el propósito. Las responsabilidades del dueño del proceso incluyen diseño, gestión de cambios y la mejora continua del proceso y sus métricas.',
                'ki_icon' => 'ki-eye'
            ]);
    }
}
