<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIPOS DE CRUD</title>
</head>
<body>
    <a href="{{ url('/crudUsuarios') }}">USUARIOS</a>
    <a href="{{ url('/crud/{2}') }}">LOCALES</a>
    <a href="{{ url('/crud/{3}') }}">COMPAÑIAS</a>
    <a href="{{ url('/crud/{4}') }}">PROMOCIONES</a>
    <a href="{{ url('/crud/{5}') }}">TARJETAS</a>
</body>
</html>