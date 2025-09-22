Formulario de creación de usuario

<form action="{{ url ('/usuario')}}" method = "post" enctype="multipart/form-data" >
@csrf 
@include ('ssvv._form',['modo'=>'Crear'])


</form>