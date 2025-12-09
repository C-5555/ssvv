@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h1>Gestión de Roles</h1>
        </div>
        <div class="col-auto">
            @can('roles.create')
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear Rol</a>
            @endcan
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-secondary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @can('roles.update')
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Editar</a>
                            @endcan
                            
                            @can('roles.delete')
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('¿Eliminar este rol?')">Eliminar</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection