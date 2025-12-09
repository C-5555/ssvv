<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         Area::create([
            'nombre' =>'Recursos humanos',
            'código' => '1',
            'status' => true,
            'presupuesto' => '23000'
        
         ]);
        
    }
}
