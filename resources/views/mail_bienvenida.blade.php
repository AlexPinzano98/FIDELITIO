<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | STIMPA</title>
</head>

<body>
    <div style="border: 1px solid black; border-radius: 10px;width: 40%; margin-left: 30%; padding-top: 5%; padding-bottom:5%; background-color: whitesmoke;">
        <img src="img/stimpa.png" style="width: 60%; margin-left: 20%; border-bottom: 2px solid black;">
        <p style="width:40%;text-align: justify;margin-left:30%">Hola {{ $UserController->name }}.<br> Su registro ha sido completado con exito, empieze a canjear QR y rellenar tarjetas!!</p>
    </div>
</body>
</html>