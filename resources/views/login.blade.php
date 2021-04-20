<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="js/valLogin.js"></script>
</head>

<body>
   <!--  <p class="h1">Fidelitio</p> -->
    <img src="img/stimpa.jpeg" style="width: 80%; margin-left: 10%; margin-top: 20px">
    <div class="login">
        <form action="{{url('/validarlogin')}}" method="POST" onsubmit="return validarForm()">
            {{csrf_field()}}
            <div class="mb-3">
                <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input name="psswd" type="password" class="form-control" id="contrasenya"
                    placeholder="Contrasenya..."></input>
            </div>
            <button type="submit" id="submit" class="btn btn-warning">
                Inicia Sesión
            </button>
            
            <div id="separacion">
                <div id="hr"></div>
                <div id="o">O</div>
                <div id="hr"></div>
            </div>

            <button type="button" class="btn btn-primary">
                Continuar con Facebook
            </button>
            <button type="button" class="btn btn-info">
                Continuar con Google
            </button>

            <div id="message">
            </div>
            <p id="error"> {{Session::get('message')}} </p>

        </form>
    </div>

    <div class="container">
        ¿No tienes cuenta?<a href="{{url('/registro')}}"><br>Registrate</a>
    </div>
</body>

</html>
