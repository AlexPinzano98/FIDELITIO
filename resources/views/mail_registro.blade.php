<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Completado | STIMPA</title>
    <style>
        .btn {
            width: 40%;
            margin-left: 30%;
            color: #fff !important;
            text-transform: uppercase;
            text-decoration: none;
            background: #edd430;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
            border: none;
            transition: all 0.4s ease 0s;
            cursor: pointer;
        }
        .btn:hover {
            background: #b5a645;
            letter-spacing: 1px;
            -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            box-shadow: 5px 40px -10px rgba(0, 0, 0, 0.57);
            transition: all 0.4s ease 0s;
        }
    </style>
</head>

<body>
        <p>Bienvenido {{ $UserController->name }}.<br> Su cuenta se ha creado exitosamente, hemos asignado una contraseña aleatoria, si desea cambiarla, hágalo desde este correo</p>
        <form  method="POST" action="https://localhost/FIDELITIO/public/password_reset">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{ $UserController->id_user }}" id="id_user" name="id_user" class="btn btn-warning">
            <button type="submit" id="btn" class="btn"><a style="cursor: pointer;"> Cambiar Contraseña</a> </button>                       
        </form>
    </div>
</body>
</html>



