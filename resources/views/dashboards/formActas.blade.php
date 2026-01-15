@extends('layout')

@section ('content1')
- Formulario para Actas
@endsection
@section('content')
<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" type="text/css">
<form method="POST" action="{{ route('actas.store') }}">
    @csrf
    <div class="container-fluid p-0 mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombreCompleto"> Nombre Completo</label>
                        <input type="text" class="form-control form-control-lg" id="nombreCompleto" name="nombreCompleto" value="{{ old('nombreCompleto') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="claveTContratacion"> Clave Contratación</label>
                        <input type="text" class="form-control form-control-lg" id="claveTContratacion" name="claveTContratacion" value="{{ old('claveTContratacion') }}" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="areaAdscripcion"> Área Adscripción</label>
                        <input type="text" class="form-control" name="areaAdscripcion" id="areaAdscripcion" value="{{ old('areaAdscripcion') }}" required>
                        </div>
                    <div class="col-md-6 mb-3"> 
                        <label for="rfc"> RFC</label>
                        <input type="text" class="form-control form-control-lg" id="rfc" name="rfc" value="{{ old('rfc') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="perfil" >Perfil</label>
                        <input type="text" class="form-control form-control-lg" id="perfil" name="perfil" value="{{ old('perfil') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cargo"> Cargo </label>
                        <input type="text" class="form-control form-control-lg" id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="claveTSolicitud"> Clave de Solicitud</label>
                        <input type="text" class="form-control form-control-lg" id="claveTSolicitud" name="claveTSolicitud" value="{{ old('claveTSolicitud') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="claveSistema"> Clave del Sistema</label>
                        <input type="text" class="form-control form-control-lg" id="claveSistema" name="claveSistema" value="{{ old('claveSistema') }}" required>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection