<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - PROMOCIONES</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    <h1>PROMOCIONES</h1>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS PROMOCIONES -->
    <div class="datos">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nº sellos</th>
                    <th>Premio</th>
                    <th>Nombre promo</th>
                    <th>Status</th>
                    <th>Expiration</th>
                    <th>Establecimiento</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
    </div>

    <script src="js/crud_master_promociones.js"></script>
</body>
</html>