<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function getUsuario()
    {
        $user = Users::select('id', 'rfc', 'password')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => Crypt::encryptString($user->id),
                    'id_raw' => $user->id,
                    'rfc' => $user->rfc,
                    'name' => $user -> rfc,
                    'password' => $user->password
                ];
            });

      
        return response()->json(['data' => $user]);
    }

    public function index()
    {
        // Verificar permiso
        $this->authorize('users.index');
        
        $users = Users::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
    return view('auth.register');
    }

    // En UsersController.php
    public function store (Request $request)
    {
        // Método auxiliar para crear usuario
        try {
            $user = new Users;
            $user->rfc = $request->rfc;
            $user->password = Hash::make($request->password);
            $user->name = $request->rfc; 
            $user->save();

            // Asignar rol si viene
            if ($request->has('role')) {
                $user->assignRole($request->role);
            }

            return $user;
            
        } catch (\Exception $e) {
            throw new \Exception('Error al crear usuario: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'rfc' => 'required',
            'password' => 'required',
        ]);

        return view ('ssvv.index', compact('credentials'));

    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/ssvv/login');
    }
    
    public function edit($encryptedId)
    {
        $decryptedId = Crypt::decryptString($encryptedId);
        $empleado = Empleado::with('usuario')->findOrFail($decryptedId);
    
        return view('ssvv.edit', compact('empleado'));
    }
    public function update(Request $request, Users $user)
    {
        $this->authorize('users.update');
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
        
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Users $user)
    {
        $this->authorize('users.delete');
        
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}