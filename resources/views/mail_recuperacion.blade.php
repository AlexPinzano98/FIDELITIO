<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación | STIMPA</title>
    <link rel="stylesheet" href="{{asset('css/recuperacionM.css')}}">
</head>

<body>
    <p>Hola {{ $UserController->name }}, ha solicitado su cambio de contraseña, clique en el botón y le llevara a una página para poder hacerlo</p>
    <form  method="POST" action="https://localhost/FIDELITIO/public/password_reset">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="{{ $UserController->id_user }}" id="id_user" name="id_user" class="btn btn-warning">
        <button type="submit" id="btn" class="btn"><a style="cursor: pointer;"> Cambiar Contraseña</a> </button>                      
    </form>
</body>
</html>



