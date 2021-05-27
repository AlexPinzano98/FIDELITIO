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

    <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO -->
    <div>
        <h1>Registra una nueva tarjeta</h1>
        <button id="btn-register" onclick="openRegister()">REGISTRAR!</button>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UNA TARJETA -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> REGISTRA UNA TARJETA</h1>
        <button onclick="closeRegister()">CANCELAR</button>

        <div class="mb-3">
            <select id="local" name="rol" onchange="start_promocion()">
            </select>
        </div>
        <div class="mb-3">
            <select id="promo" name="promo">
            </select>
        </div>
        <div class="mb-3">
            <input name="email" type="text"  id="email"
                placeholder="Email..."></input>
        </div>
        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_tarjeta()">
            Registrar tarjeta
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UNA TARJETA -->
    <div id="actualizar" class="actualizar" style="display: none;">
        <h1> ACTUALIZA UNA TARJETA</h1>
        <button onclick="closeUpdate()">CANCELAR</button>

        <div class="mb-3">
            <select id="locala" name="rol">
            </select>
        </div>
        <div class="mb-3">
            <select id="promoa" name="promo">
            </select>
        </div>
        <div class="mb-3">
            <input name="sellosa" type="number"  id="sellosa"
                ></input>
        </div>
        <div class="mb-3">
            <input name="email" type="text"  id="emaila"
                placeholder="Email..."></input>
        </div>
        <button type="submit" id="submit" class="btn btn-warning">
            Registrar tarjeta
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS TARJETAS -->
    <p>Num de resultados</p>
    <select id="results" name="results" onchange="mostrar_datos()">
        <option selected value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
    </select>
    <div class="datos">
        <table>
            <thead>
                <tr>
                    <th>Nº sellos</th>
                    <th>Status</th>
                    <th>Promoción</th>
                    <th>Usuario</th>
                    <th>Creación</th>
                    <th>Finalización</th>
                    <th>Status_card</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr>
                    <th> <input type="number" name="f_sellos" id="f_sellos" onkeyup="ver_tarjetas()"> </th>
                    <th> <select class="form-control" id="f_status" name="f_status" onchange="ver_tarjetas()">
                            <option selected value="">-</option>
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                         </select> </th>
                    <th> <input type="text" name="f_promo" id="f_promo" onkeyup="ver_tarjetas()"> </th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_tarjetas()"> </th>
                    <th></th>
                    <th></th>
                    <th></th>
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

    <script src="js/validateCrudTarjeta.js"></script>
    <script src="js/crud_local_tarjetas.js"></script>
</body>
</html>
