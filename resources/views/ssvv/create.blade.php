@extends('layout')

@section('content1')
- Formulario de creación de usuarios
@endsection


@section('content')
<form action="{{ url('ssvv/store') }}" method="post" enctype="multipart/form-data" >
    @csrf 
    @method('POST')
    @include('ssvv._form')

</form>
@endsection


