<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
     DB::table('empleados')->insert ([
            'Nombre' =>'Juan',
            'Apellido_paterno' => 'X',
            'Apellido_materno' => 'Y',
            'id_departamento' => '4', 
            'Puesto'=> 'Supervisor',
            'Fecha_ingreso' => '22-06-2024',
            'Email'=> 'juan@gmail.com',
            'RFC' => '5544875698AS',
            'Foto'=> '.',
            'id_solicitud' => '1'
      
      ]);
}
};
