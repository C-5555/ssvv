@extends('layout')
@section ('content1')
- Lista de Usuarios
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>                 </div>
            <div>  
                <h1>Usuarios</h1>
            </div>
            <div>
                <a href="{{ url('ssvv/create') }}" class="btn btn-create d-flex justify-content-end"> <i class="fas fa-plus"></i> Crear usuario</a>        
            </div> 
        </div>       
    
        <!-- Tabla -->
        <table id="tablaUsuarios" class="display" style="width:100%">
            <thead>

                <tr>
                    <th>Id</th>
                    <th data-sort="nombre">Nombre</th>
                    <th data-sort="apellido_paterno">Apellido Paterno</th>
                    <th data-sort="apellido_materno">Apellido Materno</th>
                    <th data-sort="id_departamento">Departamento</th>
                    <th data-sort="puesto">Puesto</th>
                    <th data-sort="fecha_ingreso">Fecha de Ingreso</th>
                    <th data-sort="email">Email</th>
                    <th data-sort="rfc">RFC</th>                    
                    <th data-sort="status">Status</th> 
                    <th data-sort="acciones">Acciones</th>
                                       
                </tr>
            </thead>
            <tbody id="tableBody">
               @foreach ($empleado as $empleados)
                    <tr class="table-secondary">
                        <td>{{$empleados->id }}</td>
                        <td>{{$empleados->nombre}}</td>
                        <td>{{$empleados->apellido_paterno}}</td>
                        <td>{{$empleados->apellido_materno}}</td>
                        <td>{{$empleados->id_departamento}}</td>
                        <td>{{$empleados->puesto}}</td>
                        <td>{{$empleados->fecha_ingreso}}</td>
                        <td>{{$empleados->email}}</td>
                        <td>{{$empleados->rfc}}</td> 
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
@endsection

@section('scripts')
<script src="{{ url('assets/js/usuarios/usuarios.js') }}"></script>
@endsection
