<!DOCTYPE html>
<html lang="es">
<head> 
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - LOCALES | STIMPA</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    <h1>LOCALES</h1> 

    <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO -->
    <div>
        <h1>Registra un nuevo establecimiento</h1>
        <button id="btn-register" onclick="openRegister()">REGISTRAR!</button>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UN LOCAL -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> REGISTRA UN ESTABLECIMIENTO</h1>
        <button onclick="closeRegister()">CANCELAR</button>
            
            <div>
                <p>LOCAL</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre promo..."></input>
                
                <select class="form-control" id="company" name="company">
                    <option selected value="">-</option>
                </select> 

                <select class="form-control" id="grupo" name="grupo">
                    <option selected value="">-</option>
                </select> 

                <p>DIRECCIÓN</p>
                <input name="dir" type="text" id="dir" placeholder="Dirección..."></input>
                <input name="num_dir" type="text" id="num_dir" placeholder="Num dirección..."></input>
                <input name="cod_pos" type="text" id="cod_pos" placeholder="Código Postal..."></input>
                <input name="ciudad" type="text" id="ciudad" placeholder="City..."></input>
            </div>

        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_local()">
            Registrar promocion
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UN LOCAL -->
    <div id="actualizar" class="actualizar" style="display: none;">
        <h1> ACTUALIZA UN ESTABLECIMIENTO</h1>
        <button onclick="closeRegister()">CANCELAR</button>
            
            <div>
                <input name="id_local" id="id_local" readonly>
                <p>LOCAL</p>
                <input name="nombrea" type="text" id="nombrea" placeholder="Nombre promo..."></input>
                
                <input name="emaila" type="text" id="emaila" placeholder="Email..."></input>
                
                <select class="form-control" id="companya" name="companya">
                    <option selected value="">-</option>
                </select> 

                <select class="form-control" id="grupoa" name="grupoa">
                    <option selected value="">-</option>
                </select> 

                <p>DIRECCIÓN</p>
                <input name="dira" type="text" id="dira" placeholder="Dirección..."></input>
                <input name="num_dira" type="text" id="num_dira" placeholder="Num dirección..."></input>
                <input name="cod_posa" type="text" id="cod_posa" placeholder="Código Postal..."></input>
                <input name="ciudada" type="text" id="ciudada" placeholder="City..."></input>
            </div>

        <button type="submit" id="submit" class="btn btn-warning" onclick="actualizar_local()">
            Registrar promocion
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS LOCALES -->
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
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Compañia</th>
                    <th>Grupo</th>
                    <th>Dirección</th>
                    <th>C.P.</th>
                    <th>Ciudad</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_locales()"> </th>
                    <th> <input type="text" name="f_email" id="f_email" onkeyup="ver_locales()"> </th>
                    <th> <input type="text" name="f_company" id="f_company" onkeyup="ver_locales()"> </th>
                    <th> <input type="text" name="f_grupo" id="f_grupo" onkeyup="ver_locales()"> </th>
                    <th> <input type="text" name="f_dir" id="f_dir" onkeyup="ver_locales()"> </th>
                    <th> <input type="number" name="f_cp" id="f_cp" onkeyup="ver_locales()"> </th>
                    <th> <input type="text" name="f_ciudad" id="f_ciudad" onkeyup="ver_locales()"> </th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
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

    <script src="js/crud_master_locales.js"></script>
</body>
</html>