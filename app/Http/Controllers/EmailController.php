<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailToken;
use App\Models\Users;

class EmailController extends Controller
{
    public function verificar($user, Request $request)
    {
        $token = $request->query('token');

        $registro = EmailToken::where('id_user', $user)
            ->where('token', $token)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$registro) {
            abort(403, 'Token inválido o ya usado');
        }

        $registro->update(['used' => true]);

        $usuario = Users::findOrFail($user);
        $usuario->email_verified_at = now();
        $usuario->save();

        return 'Cuenta activada correctamente';
    }
}
