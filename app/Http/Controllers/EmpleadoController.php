<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Crypt;
use App\Models\Usuarios;

class EmpleadoController extends Controller
{ 
    public function getEmpleado()
    {
        $empleado = Empleado::select('id', 'nombre', 'apellido_paterno', 'apellido_materno', 'id_area', 'puesto', 'fecha_ingreso', 'email', 'rfc', 'status', 'id_solicitud')
            ->get()
            ->map(function ($empleado) {
                return [
                    'id' => Crypt::encryptString($empleado->id),
                    'id_raw' => $empleado->id,
                    'nombre' => $empleado->nombre,
                    'apellido_paterno' => $empleado->apellido_paterno,
                    'apellido_materno' =>$empleado->apellido_materno,
                    'id_area' => $empleado->id_area,
                    'puesto' => $empleado->puesto,
                    'fecha_ingreso' => $empleado->fecha_ingreso,
                    'email' => $empleado->email,
                    'rfc' => $empleado->rfc,
                    'status' => $empleado->status ? 'Activo' : 'Inactivo',
                    'id_solicitud'=> Crypt::encryptString($empleado->id_solicitud)
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empleado=Empleado::get();
        return view ('dashboards.listaDatosUsuarios',compact ('empleado')); 
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        //
        //$empleado=Empleado::get();
        //return view ('dashboards.listaDatosUsuarios', compact ('empleado')); 
    }
    

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
       //$datos_empleado = $request->all();
       
        $datos_empleado = new Empleado; 
        //$datos_empleado = $request->except('_token');
        //$datos_empleado->status = $request ->boolean('status');
        
        
       //dd ( $datos_empleado->nombre = $request->nombre);
        $datos_empleado->nombre = $request->nombre;
        $datos_empleado->apellido_paterno =$request->apellido_paterno;
        $datos_empleado->apellido_materno =$request->apellido_materno;
        $datos_empleado->id_area =$request->id_area;
        $datos_empleado->puesto =$request->puesto;
        $datos_empleado->fecha_ingreso =$request->fecha_ingreso;
        $datos_empleado->email=$request->email;
        $datos_empleado->rfc =$request->rfc;
        $datos_empleado->status = true;
        //dd($request -> all()); 
        $datos_empleado->save();
        //dd($datos_empleado->save());
        //Empleado::insert($datos_empleado);
       // return response()->json($datos_empleado);
       return redirect('ssvv/listadatos')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     */

    public function show($encryptedId)
    {
    try {
        $id = Crypt::decryptString($encryptedId);
        $empleado = Empleado::findOrFail($id);
        
        return view('ssvv.show', compact('empleado'));
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'ID inválido');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($encryptedId)
    {
        $decryptedId = Crypt::decryptString($encryptedId);
        $empleado = Empleado::findOrFail($decryptedId);

        $empleado->encrypted_id = $encryptedId;

        return view('ssvv.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
/*     public function update(Request $request, $Id)
    {
       // dd($request);
        //$decryptedId = Crypt::decryptString($Id);
        $empleado = Empleado::findOrFail($Id);

        $datos_empleado = $request->except(['_token','_method']);
 
        $empleado->update($datos_empleado);

            return redirect()->route('ssvv.lista')->with('success', 'Empleado actualizado correctamente.');

    } */

    public function update(Request $request, $id)
    {
    //dd($request);
    $empleado = Empleado::findOrFail($id);

    $datos_empleado = $request->except(['_token','_method']);
 //dd($datos_empleado);
    $empleado->update($datos_empleado);

    return redirect()->route('ssvv.listadatos')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

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
