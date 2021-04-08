<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="js/validacion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <p class="h1">Inicia Sesión</p>
        <div class="login">
            <form action="{{url('/validarlogin')}}" method="POST" onsubmit="return validarForm()">
            {{csrf_field()}}
            <div class="mb-3">
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input name="psswd" class="form-control" id="exampleFormControlTextarea1" placeholder="Contrasenya..."></input>
            </div>
            <button type="submit" value="enviar">Iniciar</button>
            </form>

            @if (!empty($alex))
                <p style="color: red;">{{$alex}}<p><br>
            @endif

        </div>
</div>
</body>
</html>
