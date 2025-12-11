<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Crypt;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmpleadoController extends Controller
{ 
    public function getEmpleado()
    {
        $empleado = Empleado::select('id', 'id_user', 'nombre', 'apellido_paterno', 'apellido_materno', 'id_area', 'puesto', 'fecha_ingreso', 'email', 'status')
            ->get()
            ->map(function ($empleado) {
                return [
                    'id' => Crypt::encryptString($empleado->id),
                    'id_raw' => $empleado->id,
                    'id_user'=>Crypt::encryptString($empleado->id_user),
                    'rfc' => $empleado->user->rfc ?? 'Sin RFC',
                    'nombre' => $empleado->nombre,
                    'apellido_paterno' => $empleado->apellido_paterno,
                    'apellido_materno' =>$empleado->apellido_materno,
                    'id_area' => $empleado->id_area,
                    'puesto' => $empleado->puesto,
                    'fecha_ingreso' => $empleado->fecha_ingreso,
                    'email' => $empleado->email,
                    'status' => $empleado->status ? 'Activo' : 'Inactivo',
                ];
            });

      
        return response()->json(['data' => $empleado]);
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
        $datos_empleado->status = true;
        $datos_empleado->save();

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
        
        return view('ssvv.show', compact('empleado'));
    }
       

    public function edit($encryptedId)
    {
        $decryptedId = Crypt::decryptString($encryptedId);
        $empleado = Empleado::with('user')->findOrFail($decryptedId);
        
        return view('ssvv.edit', compact('empleado'));
    }


    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $datos_empleado = $request->except(['_token', '_method', 'rfc']);
        $empleado->update($datos_empleado);

    if ($empleado->user && $request->has('rfc')) {
        $empleado->user->update([
            'rfc' => $request->rfc
        ]);
        }
        return redirect()->route('ssvv.listadatos')->with('success', 'Empleado actualizado correctamente.');
    }
    

    public function destroy($encryptedId)
    {
    try {
        $id = Crypt::decryptString($encryptedId);
        
        $empleado = Empleado::findOrFail($id);
        
        $empleado->status = !$empleado->status;
        $empleado->save();
        
        $mensaje = $empleado->status ? 
            'Empleado activado correctamente' : 
            'Empleado desactivado correctamente';

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'mensaje' => $mensaje,
                'nuevo_status' => $empleado->status
            ]);
        }
        
        return redirect('ssvv/lista')->with('mensaje', $mensaje);
        
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar el estado: ' . $e->getMessage()
                ], 500);
            }
        
        return redirect('ssvv/lista')->with('error', 'Error al actualizar el estado');
        }
    }
}
