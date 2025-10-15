<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" type="text/css">

<div class="container2">

    <h1> {{$modo}} usuario</h1>

    <label for="nombre"> Nombre </label>
    <input type="text" name="nombre" value="{{ isset($empleados ->nombre)?$empleados ->nombre:'' }}" id="nombre"> <br>

    <label for="apellido_paterno"> Apellido paterno</label>
    <input type= "text" name= "apellido_paterno" value="{{ isset($empleados ->apellido_paterno)? $empleados ->apellido_paterno:''}}" id= "apellido_paterno"> <br>

    <label for="apellido_materno"> Apellido materno</label>
    <input type="text" name="apellido_materno" value="{{isset ($empleados ->apellido_materno)?$empleados ->apellido_materno:'' }}" id="apellido_materno"><br>

    <label for="id_departamento"> Departamento</label>
    <input type="text" name="id_departamento" value="{{isset ($empleados ->id_departamento)?$empleados ->id_departamento:'' }}" id="id_departamento"><br>

    <label for="puesto"> Puesto </label>
    <input type="text" name="puesto" value="{{ isset($empleados ->puesto)?$empleados ->puesto:'' }}" id="puesto"> <br>

    <label for="fecha_ingreso"> Fecha de ingreso </label>
    <input type="text" name="fecha_ingreso" value="{{ isset($empleados ->fecha_ingreso)?$empleados ->fecha_ingreso:'' }}" id="fecha_ingreso"> <br>

    <label for="email"> Email</label>
    <input type="text" name="email" value="{{ isset($empleados ->email)?$empleados ->email:'' }}" id="email"><br>

    <label for="rfc"> RFC </label>
    <input type="text" name="rfc" value="{{ isset($empleados ->rfc)?$empleados ->rfc:'' }}" id="rfc"> <br>

    <label for="foto"> Foto</label>
        @if(isset($empleados->foto))  
        <img src="{{asset ('storage').'/'.$empleados->foto}}" width="100" alt=""> 
        @endif
    <input type="file" name="foto" value="" id="foto"><br><br>

    <input type="hidden" name="status" value= 0>


    
    <!--<label for="enviar"> Enviar</label>-->
    <!--<input type="submit" value="{{$modo}} datos"> -->
    <button type="submit" >Guardar</button>

    <!--<a href="{{ url('empleados/')}}">Regresar </a>-->
    <br>


</div>