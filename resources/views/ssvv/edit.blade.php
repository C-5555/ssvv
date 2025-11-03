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
    <form class="row g-3" action="{{ route('ssvv.update', $empleado->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre"> Nombre </label>
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="{{ $empleado->nombre }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="apellido_paterno"> Apellido paterno</label>
                            <input type="text" class="form-control form-control-lg" id="apellido_paterno" name="apellido_paterno" value="{{ $empleado->apellido_paterno }}" required>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido_materno"> Apellido materno</label>
                            <input type="text" class="form-control form-control-lg" id="apellido_materno" name="apellido_materno" value="{{ $empleado->apellido_materno }}" required>
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="area"> Área</label>
                            <input type="text" class="form-control form-control-lg" id="area" name="area" value="{{ $empleado->area }}" required>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="puesto"> Puesto </label>
                            <input type="text" class="form-control form-control-lg" id="puesto" name="puesto" value="{{ $empleado->puesto }}" required>
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="fecha_ingreso"> Fecha de ingreso </label>
                            <input type="text" class="form-control form-control-lg" id="fecha_ingreso" name="fecha_ingreso" value="{{ $empleado->fecha_ingreso }}" required>
                         </div>
                        <div class="col-md-6 mb-3">
                            <label for="email"> Correo</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ $empleado->email}}" required>
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="rfc"> RFC </label>
                            <input type="text" class="form-control form-control-lg" id="rfc" name="rfc" value="{{ $empleado->rfc }}" required>
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
