@extends('layout')

@section ('content1')
- Viáticos
@endsection
@section('content')
<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" type="text/css">

<div class="container-fluid p-0 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" >Nombre</label>
                    <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="{{isset($empleados->nombre) ? $empleados->nombre : '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido_paterno"> Apellido paterno</label>
                    <input type="text" class="form-control form-control-lg" id="apellido_paterno" name="apellido_paterno" value="{{isset($empleados->apellido_paterno) ? $empleados->apellido_paterno : '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido_materno"> Apellido materno</label>
                    <input type="text" class="form-control form-control-lg" id="apellido_materno" name="apellido_materno" value="{{isset($empleados->apellido_materno) ? $empleados->apellido_materno : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rfc"> RFC</label>
                    <input type="text" maxlength= "13" class="form-control" name="rfc" id="rfc" value="{{ isset($user->rfc) ? $user->rfc : '' }}" required>       
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nickname"> Nickname</label>
                    <input type="text" class="form-control" name="nickname" id="nickname" value="{{ isset($user->name) ? $user->name : '' }}" required>
                    </div>
                <div class="col-md-6 mb-3">
                    <label for="password"> Password</label>                   
                    <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" id="password" value="{{ isset($user->password) ? $user->password : '' }}" required>     
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                </div>
                <div class="col-md-6 mb-3"> 
                    <label for="id_area"> Área</label>
                    <input type="text" class="form-control form-control-lg" id="id_area" name="id_area" value="{{ isset($empleados->id_area) ? $empleados->id_area : '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="puesto"> Puesto </label>
                    <input type="text" class="form-control form-control-lg" id="puesto" name="puesto" value="{{isset($empleados->puesto) ? $empleados->puesto : ''}}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_ingreso"> Fecha de ingreso </label>
                    <input type="text" class="form-control form-control-lg" id="fecha_ingreso" name="fecha_ingreso" value="{{isset($empleados->fecha_ingreso) ? $empleados->fecha_ingreso : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email"> Correo</label>
                    <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{isset($empleados->email) ? $empleados->email : ''}}" required>
                </div>
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary px-4 py-2">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

