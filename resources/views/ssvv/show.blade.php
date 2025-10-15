@extends('layout')

@section ('content1')
- Formulario de edición de usuario
@endsection

@section('content')

    <label for="nombre"> Nombre </label>
    <input type="text" name="nombre" value="{{ isset($empleados ->nombre)?$empleados ->nombre:'' }}" id="nombre" disabled> <br>

    <label for="apellido_paterno"> Apellido paterno</label>
    <input type= "text" name= "apellido_paterno" value="{{ isset($empleados ->apellido_paterno)? $empleados ->apellido_paterno:''}}" id= "apellido_paterno" disabled> <br>

    <label for="apellido_materno"> Apellido materno</label>
    <input type="text" name="apellido_materno" value="{{isset ($empleados ->apellido_materno)?$empleados ->apellido_materno:'' }}" id="apellido_materno" disabled><br>

    <label for="id_departamento"> Departamento</label>
    <input type="text" name="id_departamento" value="{{isset ($empleados ->id_departamento)?$empleados ->id_departamento:'' }}" id="id_departamento" disabled><br>

    <label for="puesto"> Puesto </label>
    <input type="text" name="puesto" value="{{ isset($empleados ->puesto)?$empleados ->puesto:'' }}" id="puesto" disabled> <br>

    <label for="fecha_ingreso"> Fecha de ingreso </label>
    <input type="text" name="fecha_ingreso" value="{{ isset($empleados ->fecha_ingreso)?$empleados ->fecha_ingreso:'' }}" id="fecha_ingreso" disabled> <br>

    <label for="correo"> Correo</label>
    <input type="text" name="correo" value="{{ isset($empleados ->email)?$empleados ->email:'' }}" id="email" disabled><br>

    <label for="rfc"> RFC </label>
    <input type="text" name="nombre" value="{{ isset($empleados ->rfc)?$empleados ->rfc:'' }}" id="rfc" disabled> <br>

    <label for="foto"> Foto:</label>
    <img src="{{asset ('storage').'/'.$empleados->foto}}" width="100" alt="" > 
    

@endsection