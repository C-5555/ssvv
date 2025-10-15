@extends('layout')

@section('content1')
- Formulario de creación de usuario
@endsection


@section('content')
<form action="{{ url('ssvv/store') }}" method="post" enctype="multipart/form-data" >
    @csrf 
    @method('POST')
    @include('ssvv._form',['modo'=>'Crear'])

</form>
@endsection
