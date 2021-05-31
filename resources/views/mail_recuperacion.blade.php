<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación | STIMPA</title>
    <style>
        .btn {
            width: 40%;
            margin-left: 30%;
            color: #fff !important;
            text-transform: uppercase;
            text-decoration: none;
            background: #ed3330;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
            border: none;
            transition: all 0.4s ease 0s;
            cursor: pointer;
        }
        .btn:hover {
            background: #434343;
            letter-spacing: 1px;
            -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            box-shadow: 5px 40px -10px rgba(0, 0, 0, 0.57);
            transition: all 0.4s ease 0s;
        }
    </style>
</head>

<body>
    <div style="border: 1px solid black; border-radius: 10px;width: 90%; margin-left: 5%; padding-top: 5%; padding-bottom:5%; background-color: whitesmoke;">
        <p style="width:90%;text-align: justify;margin-left:5%">Hola {{ $UserController->name }}.<br> Ha solicitado su cambio de contraseña, clique en el botón y le llevara a una página para poder hacerlo</p>
        <form  method="POST" action="https://localhost/FIDELITIO/public/password_reset">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="{{ $UserController->id_user }}" id="id_user" name="id_user" class="btn btn-warning">
            <button type="submit" id="btn" class="btn"><a style="cursor: pointer;"> Cambiar Contraseña</a> </button>                      
        </form>
    </div>
</body>
</html>



