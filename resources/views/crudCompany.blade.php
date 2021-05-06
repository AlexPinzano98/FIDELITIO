<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - COMPAÑIAS</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    <p>COMPAÑIAS</p>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS LOCALES -->
    <div class="datos">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
    </div>

    <script src="js/crud_master_companyias.js"></script>
</body>
</html> 