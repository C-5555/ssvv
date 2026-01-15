@extends('layout')

@section ('content1')
-  Actas
@endsection
@section('content')
<h2>Datos de la API</h2>

@if(!empty($datos))
    <table>
        <thead>
            <tr>
                <th>Columna 1</th>
                <th>Columna 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $item)
                <tr>
                    @if(is_array($item))
                        @foreach($item as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    @else
                        <td>{{ $item }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No se pudo obtener información de la API o no hay datos.</p>
@endif


@endsection