<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage; 

class EmpleadoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::get();
        $empleado=Empleado::get();
        return view ('dashboards.listaUsuarios',compact ('empleado', 'datos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        //
        //$empleado=Empleado::get();
        //return view ('dashboards.listaUsuarios', compact ('empleado')); 
    }
    

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        //
        $valided =$request->validate([
            'status' => 'sometimes|boolean'
        ]);

       //$datos_empleado = $request->all();
       
        $datos_empleado = new Empleado; 
        //$datos_empleado = $request->except('_token');
        //$datos_empleado->status = $request ->boolean('status');
        
        
       //dd ( $datos_empleado->nombre = $request->nombre);
        $datos_empleado->nombre = $request->nombre;
        $datos_empleado->apellido_paterno =$request->apellido_paterno;
        $datos_empleado->apellido_materno =$request->apellido_materno;
        $datos_empleado->id_departamento =$request->id_departamento;
        $datos_empleado->puesto =$request->puesto;
        $datos_empleado->fecha_ingreso =$request->fecha_ingreso;
        $datos_empleado->email=$request->email;
        $datos_empleado->rfc =$request->rfc;
        $datos_empleado->status = $request->status;
        //dd($request -> all()); 
        if($request->hasFile('foto')){
            $datos_empleado ['foto']=$request->file('foto')->store('uploads', 'public');
        } else {
            $datos_empleado->foto= null;
        }
        $datos_empleado->save();

//dd($datos_empleado->save());
        //Empleado::insert($datos_empleado);

       // return response()->json($datos_empleado);
       return redirect('ssvv/lista')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        //
        $empleado= Empleado::findOrfail($id);
        return view ('ssvv.show', compact('empleado'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id );
        dd ($empleado);
        return view ('ssvv.lista', compact('empleado') ); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos_empleado = $request->except(['_token','_method']);

        if($request->hasFile('foto'))
        {
            $empleado=Empleado::findOrFail($id);

            Storage::delete('public/'.$empleado->foto);

            $datos_empleado ['foto']=$request->file('foto')->store('uploads', 'public');
        }
 
        Empleado::where( 'id','=',$id)->update($datos_empleado);

        $empleado=Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje', 'Empleado editado con éxito'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $empleado=Empleado::findOrFail($id);
    $empleado->status=false;
    $empleado->save();
    
    return redirect('empleado')->with('mensaje','Empleado desactivado');
    }
}
