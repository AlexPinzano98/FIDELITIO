<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIPOS DE CRUD</title>
</head>
<body>

    <div id="permissions">
        <a href="{{ url('/crudCompany') }}">COMPAÑIAS</a>
        <a href="{{ url('/crudLocales') }}">LOCALES</a>
        <a href="{{ url('/crudPromociones') }}">PROMOCIONES</a>
        <a href="{{ url('/crudTarjetas') }}">TARJETAS</a>
        <a href="{{ url('/crudUsuarios') }}">USUARIOS</a>
    </div>

    <!-- <script src="js/permissionsAjax.js"></script> -->
</body>
</html>
