<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Empleado;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'rfc' => 'required',
        'password' => 'required'
    ]);

    $credentials = [
        'rfc' => $request->rfc,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'message' => 'Bienvenido',
            'redirect' => route('ssvv.listadatos')
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'RFC o contraseña incorrectos.'
    ], 401);
}


    public function processLogin(Request $request)
{
    $request->validate([
        'rfc' => 'required',
        'password' => 'required'
    ]);

    // Traer user + empleado
    $user = Users::with('empleado')->where('rfc', $request->rfc)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'El RFC no está registrado.'
        ], 401);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'success' => false,
            'message' => 'La contraseña es incorrecta.'
        ], 401);
    }

    // Si no tiene registro en empleados → bloquear
    if (!$user->empleado) {
        return response()->json([
            'success' => false,
            'message' => 'No se encontró información del empleado asociada a este usuario.'
        ], 403);
    }

    // Validación real del status
    if ($user->empleado->status == 0) {
        return response()->json([
            'success' => false,
            'message' => 'Tu usuario está INACTIVO. Contacta al administrador.'
        ], 403);
    }

    // Todo bien → iniciar sesión
    Auth::login($user);

    return response()->json([
        'success' => true,
        'message' => 'Bienvenido ' . $user->name,
        'redirect' => route('ssvv.listadatos')
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('ssvv/login');
    }
}
