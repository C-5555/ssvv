<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Log;
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
        Log::info('EnsureEmpleadoActivo ejecutado', [
            'url' => $request->fullUrl(),
            'route' => optional($request->route())->getName(),
        ]);

        if (!auth()->check()) {
            Log::warning('Acceso sin autenticar', [
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('login'); 
        }

        $empleado = auth()->user()->empleado;

        if (!$empleado || !$empleado->status) {
            Log::warning('Empleado inactivo o inexistente', [
                'user_id' => auth()->id(),
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('login');
        }

        return $next($request); 
    }

}
