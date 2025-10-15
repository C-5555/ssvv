@extends('layout')

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" type="text/css">
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
        
        <!-- Controles -->
        <div class="controls">
            <input type="text" id="searchInput" placeholder="Buscar...">
            <select id="rowsPerPage">
                <option value="5">5 filas</option>
                <option value="10" selected>10 filas</option>
                <option value="25">25 filas</option>
                <option value="50">50 filas</option>
            </select>
        </div>

        <!-- Tabla -->
        <table id="tablaUsuarios">
            <thead>
                <tr>
                    <th data-sort="foto">Foto</th>
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
                
                        <td>
                            @if (!empty($empleados->foto))
                                <img src="{{ asset('storage/' . $empleados->foto) }}" width="100" alt="">
                            @endif
                        </td>

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

        <!-- Paginación -->
        <div class="pagination">
            <button id="prevPage">Anterior</button>
            <span id="pageInfo">Página 1 de 1</span>
            <button id="nextPage">Siguiente</button>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('js/usuarios/usuarios.js')}}" type="text/javascript"></script>
@endsection
