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
            <h1>Usuarios</h1>
            <button class="btn-create" id="createUserBtn">
                <i class="fas fa-plus"></i> Crear Usuario
            </button>
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
        <table id="dataTable">
            <thead>
                <tr>
                    <th data-sort="nombre">Nombre</th>
                    <th data-sort="apellido_paterno">Apellido Paterno</th>
                    <th data-sort="apellido_materno">Apellido Materno</th>
                    <th data-sort="id_departamento">Departamento</th>
                    <th data-sort="puesto">Puesto</th>
                    <th data-sort="fecha_ingreso">Fecha de Ingreso</th>
                    <th data-sort="email">Email</th>
                    <th data-sort="rfc">RFC</th>
                    <th data-sort="foto">Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            <!-- Los datos se cargarán aquí -->
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

