<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions',
        ]);

        Permission::create(['name' => $request->name, 'guard_name' => 'web']);

        return redirect()->route('permissions.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        return redirect()->route('permissions.index')->with('success', 'Permiso eliminado exitosamente.');
    }
}
