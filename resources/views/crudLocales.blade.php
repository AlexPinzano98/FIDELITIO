<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - LOCALES</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>LOCALES</h1>

    <select id="resultados" name="resultados" onclick="paginado()">
        <option value="2" selected>2</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="10">10</option>
    </select> 

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS LOCALES -->
    <div class="datos">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Compañia</th>
                    <th>Grupo</th>
                </tr>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
    </div>

    <section>
        <ul id="paginacion">
            <li><a href="pagina1.html" class="active">1</a></li>
            <li><a href="pagina2.html">2</a></li>
            <li><a href="pagina3.html">3</a></li>
            <li><a href="pagina4.html">4</a></li>
            <li><a href="pagina5.html">5</a></li>
        </ul>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
    <link rel="stylesheet" href="https://pagination.js.org/dist/2.1.4/pagination.css"/>
    <script src="js/crud_master_locales.js"></script>
</body>
</html>