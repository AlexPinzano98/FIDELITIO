<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - TARJETAS</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    <h1>TARJETAS</h1>
 
    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS TARJETAS -->
    <div class="datos">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nº sellos</th>
                    <th>Status</th>
                    <th>Promoción</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <th></th>
                    <th> <input type="number" name="f_sellos" id="f_sellos" onkeyup="ver_tarjetas()"> </th>
                    <th> <select class="form-control" id="f_status" name="f_status" onclick="ver_tarjetas()">
                            <option selected value="">-</option>
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                         </select> </th>
                    <th> <input type="text" name="f_promo" id="f_promo" onkeyup="ver_tarjetas()"> </th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_tarjetas()"> </th>
                </tr>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
    </div>

    <script src="js/crud_master_tarjetas.js"></script>
</body>
</html>