<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Crypt;
use App\Models\Users; 
use App\Mail\CorreoPruebas;
use Illuminate\Support\Facades\URL;
use App\Models\EmailToken;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ActasController;

class EmpleadoController extends Controller
{ 
    public function getEmpleado()
    {
        $token = env('TOKEN_ACTAS');
        $empleado = Empleado::select('id', 'id_user', 'nombre', 'apellido_paterno', 'apellido_materno', 'id_area', 'puesto', 'fecha_ingreso', 'email', 'status')
            ->get()
            ->map(function ($empleado) {
                return [
                    'id' => Crypt::encryptString($empleado->id),
                    'id_raw' => $empleado->id,
                    'id_user'=>Crypt::encryptString($empleado->id_user),
                    'rfc' => $empleado->user->rfc,
                    'nombre' => $empleado->nombre,
                    'apellido_paterno' => $empleado->apellido_paterno,
                    'apellido_materno' =>$empleado->apellido_materno,
                    'id_area' => $empleado->area->nombre,
                    'puesto' => $empleado->puesto,
                    'fecha_ingreso' => $empleado->fecha_ingreso,
                    'email' => $empleado->email,
                    'status' => $empleado->status
                ];
            });

      
        return response()->json(['data' => $empleado, 'token' => $token]);
    }
    
     public function permisos($encryptedId)
     {
        $id = Crypt::decryptString($encryptedId);
        $empleado = Empleado::findOrFail($id);
        
        return view('ssvv.permisos', compact('empleado'));
        
    }


    public function index()
    {
        //
        $empleado = Empleado::with('user')->get();
        return view ('dashboards.listaDatosUsuarios',compact ('empleado')); 
    }

   public function create()
    {
        $user=Users::get();
        $empleado=Empleado::get();
        $roles=Role::get();
        //dd($roles);
        //dd($user, $empleado);
        return view ('ssvv.create', compact ('empleado', 'user', 'roles')); 
    }
    
   public function store(Request $request)
    {
        try {

            if (Users::where('rfc', $request->rfc)->exists()) {
                return response()->json([
                    'success' => false,
                    'error_type' => 'rfc_duplicado',
                    'message' => 'El RFC ya está registrado. No puedes crear dos usuarios con el mismo RFC.'
                ]);
            }

            $user = new Users;
            $user->rfc = $request->rfc;
            $user->password = Hash::make($request->password);
            $user->name = $request->nickname;
            $user->email_verified_at = $request->email_verified_at;
            $user->save();

            // Asignar rol
            $user->assignRole($request->roles);

            // Guardar datos de empleado
            $datos_empleado = new Empleado;
            $datos_empleado->id_user = $user->id;
            $datos_empleado->nombre = $request->nombre;
            $datos_empleado->apellido_paterno = $request->apellido_paterno;
            $datos_empleado->apellido_materno = $request->apellido_materno;
            $datos_empleado->id_area = $request->id_area;
            $datos_empleado->puesto = $request->puesto;
            $datos_empleado->fecha_ingreso = $request->fecha_ingreso;
            $datos_empleado->email = $request->email;
            $datos_empleado->status = false;
            $datos_empleado->save();

            $token = Str::random(64);
            EmailToken::create([
                'id_user' => $user->id,
                'token' => $token,
                'expires_at' => now()->addMinutes(30),
            ]);

            $tokenUrl = URL::temporarySignedRoute(
                'emails.prueba',
                now()->addMinutes(30),
                [
                    'user' => $user->id,
                    'token' => $token
                ]
            );


            Mail::to($datos_empleado->email)
                ->send(new CorreoPruebas($tokenUrl));

            

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Empleado creado correctamente.',
                    'redirect' => route('ssvv.listadatos')
                ]);
            }

            return redirect()
                ->route('ssvv.listadatos')
                ->with('success', 'Empleado creado correctamente.');

        } catch (\Exception $e) {

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    
    public function find(Request $request)
    {
        $user = Users::find($request->user_id);

    }
        

    public function show($encryptedId)
    {
        $decryptedId = Crypt::decryptString($encryptedId);
        $empleado = Empleado::with('user')->findOrFail($decryptedId);
        $roles=Role::get();
        return view('ssvv.show', compact('empleado', 'roles'));
    }
       

    public function edit($encryptedId)
    {
        $decryptedId = Crypt::decryptString($encryptedId);
        $empleado = Empleado::with('user')->findOrFail($decryptedId);
        $roles=Role::get();
        
        return view('ssvv.edit', compact('empleado', 'roles'));
    }


    public function update(Request $request, $encryptedId)
    {
        $id = Crypt::decryptString($encryptedId);
        $empleado = Empleado::with('user')->findOrFail($id);
        $datos_empleado = $request->except(['_token', '_method', 'rfc', 'roles']);
        $empleado->update($datos_empleado);

    if ($empleado->user && $request->has('rfc')) {
        $empleado->user->update([
            'rfc' => $request->rfc
        ]);
        }
    if ($empleado->user && $request->filled('roles')) {
        $empleado->user->syncRoles($request->roles);
    }
    return redirect()->route('ssvv.usuario')->with('success', 'Empleado actualizado correctamente.');
    }
    

    public function destroy($encryptedId)
    {
        try {
            $token = env('TOKEN_ACTAS');
            $id = Crypt::decryptString($encryptedId);
            $empleado = Empleado::findOrFail($id);

            if ($empleado->status === 'pendiente') {

                $response = Http::withToken($token)->get(
                    'https://api.finanzas.cdmx.gob.mx/actas/estado',
                    [
                        'rfc' => $empleado->user->rfc,
                        'email' => $empleado->email
                    ]
                );

                if (!$response->successful() || !$response->json('firmada')) {
                    return response()->json([
                        'success' => false,
                        'estado' => 'pendiente',
                        'mensaje' => 'El empleado debe firmar el acta enviada a su correo.'
                    ], 409);
                }

                // si ya firmó → activar
                $empleado->status = 'activo';
            }
            elseif ($empleado->status === 'activo') {
                $empleado->status = 'inactivo';
            }
            else {
                $empleado->status = 'activo';
            }

            $empleado->save();

            return response()->json([
                'success' => true,
                'estado' => 'ok',
                'mensaje' => 'Estado actualizado correctamente',
                'nuevo_status' => $empleado->status
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'mensaje' => 'Error al actualizar el estado'
            ], 500);
        }
    }

}
