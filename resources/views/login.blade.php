<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="js/valLogin.js"></script>
</head>

<body>
    <p class="h1">Inicia Sesión</p>
    <div class="container">
        <form action="{{url('/validarlogin')}}" method="POST" onclick="return validarForm()">
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico..."></input>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="contrasenya" name="contrasenya" placeholder="Contrasenya..."></input>
            </div>

            <a href="#" class="text-primary">¿Has olvidado tu contraseña?</a><br>

            <button type="button" class="btn btn-primary">
                Continuar con Facebook
            </button>
            <button type="button" class="btn btn-info">
                Continuar con Google
            </button>
            <button type="button" id="submit" class="btn btn-warning" style="margin-top:15%;">
                Inicia Sesión
            </button>

            <div class="text-red" id="message">
            </div>

        </form>  
    </div>
    
    <div class="container" style="margin-top:5%;">
        <a href="./registro.php">Crear cuenta</a>
    </div>
</body>
</html>
