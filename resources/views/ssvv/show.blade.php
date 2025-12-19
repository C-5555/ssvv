@extends('layout')

@section ('content1')
- Formulario de vista de usuario
@endsection

@section('content')
<main class="content">
    <div class="container-fluid p-0 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Datos Personales</h1>
        </div>
        <form action="{{url ('/ssvv/editar '.$empleado->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre"> Nombre </label>
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="{{ $empleado->nombre }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_paterno"> Apellido paterno</label>
                            <input type="text" class="form-control form-control-lg" id="apellido_paterno" name="apellido_paterno" value="{{ $empleado->apellido_paterno }}" disabled>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_materno"> Apellido materno</label>
                            <input type="text" class="form-control form-control-lg" id="apellido_materno" name="apellido_materno" value="{{ $empleado->apellido_materno }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre de Usuario</label>
                            <input type="text" name="user_name" class="form-control" value="{{ $empleado->user->name }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="id_area"> Área</label>
                            <input type="text" class="form-control form-control-lg" id="id_area" name="id_area" value="{{ $empleado->id_area }}" disabled>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="puesto"> Puesto </label>
                            <input type="text" class="form-control form-control-lg" id="puesto" name="puesto" value="{{ $empleado->puesto }}" disabled>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="roles">Rol asignado</label> 
                            <select name="roles" class="form-select" disabled >
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" 
                                        {{$empleado->user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{$role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="fecha_ingreso"> Fecha de ingreso </label>
                            <input type="text" class="form-control form-control-lg" id="fecha_ingreso" name="fecha_ingreso" value="{{ $empleado->fecha_ingreso }}" disabled>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="email"> Correo</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ $empleado->email}}" disabled>
                         </div>

                        <div class="col-md-6 mb-3">
                                <label for="rfc">RFC</label>
                                <input type="text" class="form-control form-control-lg" id="rfc" value="{{ $empleado->user->rfc  }}" disabled>
                            </div>
                        

                        <div class="col-12 text-end mt-3">
                            <a href="{{ route('ssvv.edit', Crypt::encryptString($empleado->id)) }}" class="btn btn-primary btn-lg">
                                Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection