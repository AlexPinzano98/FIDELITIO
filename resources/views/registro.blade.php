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
    <script src="js/valReg.js"></script>
</head>

<body>
    <img src="img/stimpa.png" class="stimpa" style="margin-top: 2.9%;">
    <h1>¡Registrate!</h1>
    <div class="login">
        <form action="{{url('/registrar')}}" method="POST" onsubmit="return validarForm()">
            {{csrf_field()}}
            <div class="mb-3">
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre..."></input>
            </div>
            <div class="mb-3">
                <input name="apellidos" type="text" class="form-control" id="apellidos"
                    placeholder="Apellidos..."></input>
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input name="psswd" type="password" class="form-control" id="contrasenya"
                    placeholder="Contrasenya..."></input>
            </div>
            <div class="mb-3">
                <select class="form-control" id="sexo" name="sexo">
                    <option selected disabled value="">Selecciona tu sexo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No especificar">No especificar</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <input type="checkbox" id="consentimiento" name="consentimiento" value="1">
                <label for="consentimiento" class="ms-2">Consentimiento</label>
            </div>
            <button type="submit" id="submit" class="btn btn-warning">
                Registrate
            </button>
            <div id="message">
            </div>
            <p id="error"> {{Session::get('message')}} </p>

        </form>
    </div>

    <div class="container">
        ¿Ya tienes cuenta?<a href="{{url('/')}}"><br>Inicia Sesión</a>
    </div>
</body>
</html>
