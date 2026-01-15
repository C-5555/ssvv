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
                    <label for="motivo"> Motivo del viaje</label>
                    <input type="text" class="form-control form-control-lg" id="motivo" name="motivo" value="{{isset($solicitud->motivo) ? $solicitud->motivo : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="monto"> Monto solicitado</label>
                    <input type="text" class="form-control form-control-lg" id="monto" name="monto" value="{{isset($solicitud->monto) ? $solicitud->monto : '' }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="lugar"> Lugar de viaje</label>
                    <input type="text" class="form-control" name="lugar" id="lugar" value="{{ isset($solicitud->lugar) ? $solicitud->lugar : '' }}" required>
                    </div>
                <div class="col-md-6 mb-3"> 
                    <label for="id_area"> Área correspondiente</label>
                    <input type="text" class="form-control form-control-lg" id="id_area" name="id_area" value="{{ isset($user->id_area) ? $user->id_area : '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="puesto"> Puesto </label>
                    <input type="text" class="form-control form-control-lg" id="puesto" name="puesto" value="{{isset($solicitud->puesto) ? $solicitud->puesto : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="salida" >Fecha de salida</label>
                    <input type="text" class="form-control form-control-lg" id="salida" name="salida" value="{{isset($solicitud->salida) ? $solicitud->nombre : '' }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="regreso"> Fecha de regreso </label>
                    <input type="text" class="form-control form-control-lg" id="regreso" name="regreso" value="{{isset($solicitud->regreso) ? $solicitud->regreso : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="proyecto"> Proyecto</label>
                    <input type="text" class="form-control form-control-lg" id="proyecto" name="proyecto" value="{{isset($solicitud->proyecto) ? $solicitud->proyecto : ''}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="comision"> Días de comisión</label>
                    <input type="text" class="form-control form-control-lg" id="comision" name="comision" value="{{isset($solicitud->comision) ? $solicitud->comision : ''}}" required>
                </div>
                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary px-4 py-2">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

