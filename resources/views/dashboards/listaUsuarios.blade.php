@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" />
@endsection

@section ('content1')
- Lista de Usuarios
@endsection
@section('content')
    <div class="container">
        <div class="header-section">
            <button class="btn-create" id="createUserBtn" onclick="window.location.href='{{ url('ssvv/create') }}'" >
                    <i class="fas fa-plus"></i> Crear Usuario
            </button>
            <h1>Usuarios</h1>
                
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
                        <td>{{ $empleados->id }}</td>
                        <td>{{$empleados->nombre}}</td>
                        <td>{{$empleados->apellido_paterno}}</td>
                        <td>{{$empleados->apellido_materno}}</td>
                        <td>{{$empleados->id_departamento}}</td>
                        <td>{{$empleados->puesto}}</td>
                        <td>{{$empleados->fecha_ingreso}}</td>
                        <td>{{$empleados->email}}</td>
                        <td>{{$empleados->rfc}}</td>    

                        <td>
                            @if ($empleados->status)
                                <span class= "text-success"> ✓ Activo </span>
                            @else
                                <span class="text-danger"> Inactivo </span>
                            @endif 
                        </td>
                        <td>
                            <a class="btn btn-primary">Ver</a> <a class="btn btn-primary">Editar</a>  <button class="btn btn-danger">Eliminar</button>                                                      
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
@endsection

@section('scripts')
<script src="{{ url('assets/js/usuarios/usuarios.js') }}"></script>
@endsection
