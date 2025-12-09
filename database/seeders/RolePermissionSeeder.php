<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        $admin = Role::findByName('Admin', 'web');
        $encargado = Role::findByName('Encargado', 'web');
        $empleado = Role :: findByName('Empleado', 'web');

        $admin->syncPermissions([
            'users.index', 'users.show', 'users.create', 'users.update', 'users.delete', 'users.form',
            'roles.index', 'roles.create', 'roles.update', 'roles.delete',
            'permissions.index', 'permissions.create', 'permissions.delete',
        ]);

        $encargado->syncPermissions([
            'users.index', 'users.create', 'users.update', 'users.form', 'users.show',
        ]);

        $empleado->syncPermissions([
            'users.index', 'users.form', 'users.show'

        ]);
    }
}
