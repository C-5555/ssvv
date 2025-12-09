<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        Users::create([
            'name' => 'Administrador',
            'password' => Hash::make('password'),
            'password_confirmation' => Hash::make('password_confirmation'),
            'id_role'=>'1'
        ]);
    }
}