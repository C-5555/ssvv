@extends('layout')

@section('content1')
- Edicion de usuario
@endsection

@section('content')
<main class="content">
    <div class="container-fluid p-0 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Datos Personales</h1>
        </div>
        <form class="row g-3" action="{{ url('/ssvv/editar', ['encryptedId' => Crypt::encryptString($empleados->id)]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre"> Nombre </label>
                            <input type="text" name="nombre" value="{{ isset($empleados ->nombre)?$empleados ->nombre:'' }}" id="nombre"> <br>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="apellido_paterno"> Apellido paterno</label>
                            <input type= "text" name= "apellido_paterno" value="{{ isset($empleados ->apellido_paterno)? $empleados ->apellido_paterno:''}}" id= "apellido_paterno"> <br>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_materno"> Apellido materno</label>
                            <input type="text" name="apellido_materno" value="{{isset ($empleados ->apellido_materno)?$empleados ->apellido_materno:'' }}" id="apellido_materno"><br>
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="id_departamento"> Departamento</label>
                            <input type="text" name="id_departamento" value="{{isset ($empleados ->id_departamento)?$empleados ->id_departamento:'' }}" id="id_departamento"><br>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="puesto"> Puesto </label>
                            <input type="text" name="puesto" value="{{ isset($empleados ->puesto)?$empleados ->puesto:'' }}" id="puesto"> <br>
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="fecha_ingreso"> Fecha de ingreso </label>
                            <input type="text" name="fecha_ingreso" value="{{ isset($empleados ->fecha_ingreso)?$empleados ->fecha_ingreso:'' }}" id="fecha_ingreso"> <br>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="correo"> Correo</label>
                            <input type="text" name="correo" value="{{ isset($empleados ->email)?$empleados ->email:'' }}" id="email"><br>
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="rfc"> RFC </label>
                            <input type="text" name="nombre" value="{{ isset($empleados ->rfc)?$empleados ->rfc:'' }}" id="rfc"> <br>
                         </div>

                         <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection