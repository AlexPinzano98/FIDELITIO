<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - COMPAÑIAS</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    <h1>COMPAÑIAS</h1>

    <!-- FORMULARIO PARA REGISTRAR UN LOCAL -->
    <div id="registrar" class="registrar" >
        <h1> REGISTRA UNA COMPAÑIA</h1>
        <button onclick="closeRegister()">CANCELAR</button>
            
            <div>
                <p>NOMBRE COMPAÑIA</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre company..."></input>
            </div>
        

        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_company()">
            Registrar compañia
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <div class="datos">
        <p>Num de resultados</p>
        <select id="results" name="results" onchange="mostrar_datos()">
            <option selected value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
                <tr>
                    <th></th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_companys()"> </th>
                    <th> <input type="text" name="f_email" id="f_email" onkeyup="ver_companys()"> </th>
                </tr>
            </thead>
            <tbody id="datos">
            </tbody>
        </table>
        <div>
            <p id="total_datos"></p>
            <p id="listado"></p>
            <button onclick="prev()">Anterior</button>
            <button onclick="next()">Siguiente</button>
        </div>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UNA COMPAÑIA -->
    <div id="registrar" class="registrar" >
        <h1> ACTUALIZA UNA COMPAÑIA</h1>
        <button onclick="closeRegister()">CANCELAR</button>
            
            <div>
                <p>NOMBRE COMPAÑIA</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre company..."></input>
            </div>
        

        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_company()">
            Registrar compañia
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <script src="js/crud_master_company.js"></script>
</body>
</html>