<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmpleadoActivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    $user = Auth::user();

    if ($user) {
        if (!$user->empleado || $user->empleado->status == 0) {

            Auth::logout();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tu usuario está inactivo. Contacta al administrador.'
                ], 403);
            }
            return redirect()->route('login')
                ->with('error', 'Tu usuario está inactivo.');
        }
    }

    return $next($request);
}


}
