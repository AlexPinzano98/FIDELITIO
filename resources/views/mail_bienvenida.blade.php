<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | STIMPA</title>
    <link rel="stylesheet" href="{{asset('css/bienvenidaM.css')}}">
</head>

<body>
    <div id="contenidoM">
        <img src="img/stimpa.png" class="stimpa">
        <p>Hola {{ $UserController->name }}, su registro ha sido completado con exito, empieze a canjear QR y rellenar tarjetas!!</p>
    </div>
</body>
</html>