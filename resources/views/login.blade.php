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
    <div class="container">
        <form action="{{url('/validarlogin')}}" method="POST" onsubmit="return validarForm()">
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input class="form-control" id="exampleFormControlTextarea1" placeholder="Contrasenya..."></input>
            </div>

            <a href="#" class="text-primary stretched-link">¿Has olvidado tu contraseña?</a>

            <button type="button" class="btn btn-primary">
                Continuar con Facebook
            </button>
            <button type="button" class="btn btn-info">
                Continuar con Google
            </button>
            <button type="button" class="btn btn-warning" style="margin-top:10%;">
                Inicia Sesión
            </button>
        </form>  
    </div>
    
    <div class="container">
        <a href="./registro.php">Crear cuenta</a>
    </div>
</body>
</html>
