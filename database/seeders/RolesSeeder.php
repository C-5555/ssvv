<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Roles::create([
            'name' =>'Admin',
            'guard_name' => 'web',
        ]); 

        Roles::create([
            'name' =>'Encargado',
            'guard_name' => 'web',
        ]); 
        Roles::create([
            'name' =>'Empleado',
            'guard_name' => 'web',
        ]); 
    }
}
