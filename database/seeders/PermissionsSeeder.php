<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Users;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $permisos = [
    'users.index','users.show', 'users.create', 'users.update', 'users.delete', 'users.form', 

    'roles.index', 'roles.create', 'roles.update', 'roles.delete',

    'permissions.index', 'permissions.create', 'permissions.delete',
    ];
    foreach ($permisos as $p) {
    Permission::findOrCreate($p, 'web');
    }

    
    }    
}