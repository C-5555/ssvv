<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;



class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Empleado::create([
           'nombre' =>'Juan',
                'apellido_paterno' => 'X',
                'apellido_materno' => 'Y',
                'id_area' => '1', 
                'puesto'=> 'Supervisor',
                'fecha_ingreso' => '22-06-2024',
                'email'=> 'juan@gmail.com',
                'rfc' => '5544875698AS',
                'foto'=> '.',
                'status' => 'true',
                'id_solicitud' => '1'
        ]);
    }
};
