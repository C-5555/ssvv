<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActasController extends Controller
{
    public function store(Request $request)
    {
        $token = env('TOKEN_ACTAS');

            $response = Http::withToken($token)
                ->post('https://dev-api.finanzas.cdmx.gob.mx/acta_responsiva/mailNotificacionActaResponsiva', [
                'nombreCompleto' => $request->nombreCompleto,
                'claveTContratacion' => $request->claveTContratacion,
                'areaAdscripcion' => $request->areaAdscripcion,
                'rfc' => $request->rfc,
                'email' => $request->email,
                'perfil' => $request->perfil,
                'cargo' => $request->cargo,
                'claveTSolicitud' => $request->claveTSolicitud,
                'claveSistema' => $request->claveSistema,
                ]);
          if ($response->successful()) {
            $datos = $response->json(); 
        } else {
            $datos = ['error' => 'No se pudo obtener la información de la API'];
        }
        return view('dashboards.actas', compact('datos'));
    }
}