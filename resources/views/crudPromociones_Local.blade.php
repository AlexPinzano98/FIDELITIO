<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <title>CRUD - PROMOCIONES</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>
<body style="text-align: center;">
    <h1>Administración de promociones</h1>
    <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO DE PROMOCIONES -->
    <div>
        <h1>Registra una nueva promocion</h1>
        <button id="btn-register" onclick="openRegister()">REGISTRAR PROMO!</button>
    </div>

    <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO DE ICONOS -->
    <div>
        <h1>Registra una nuevo icono</h1>
        <button id="btn-register-icon" onclick="openRegisterIcons()">REGISTRAR ICONO!</button>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UN ICONO -->
    <div id="newIcono" style="display: none;">
        <button onclick="closeRegisterIcon()">CANCELAR</button>
        <p>Nombre del icono</p>
        <input type="text" name="icon_name" id="icon_name" >
        <p>Icono canjeado</p>
        <input type="file" name="onimg" id="onimg" >
        <div id="onprev"></div>
        <p>Icono sin canjear</p>
        <input type="file" name="offimg" id="offimg" >
        <div id="offprev"></div>
        <button id="registerIcon" onclick="registerIcon()">REGISTRAR ICONO!</button>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UNA PROMOCIÓN -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> REGISTRA UNA PROMOCIÓN </h1>
        <button onclick="closeRegister()">CANCELAR</button>
             
            <div>
            <!-- Select para escoger el icono y mostrarlos-->
                <p>Icono de la promoción</p>
                <select id="iconos"></select>
                <div>
                    <img id="img_on_r" src="" style="width: 100px;">
                    <img id="img_off_r" src="" style="width: 100px;">
                </div>
                <p>Nombre de la promoción</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre promo..."></input>
                <p>Premio de la promoción</p>
                <input name="premio" type="text" id="premio" placeholder="Premio..."></input>
                <p>Número de sellos máximos (estampados)</p>
                <input name="sellos" type="number" id="sellos" placeholder="Sellos máximos..."></input>
                <p>La promoción será ilimitada?</p>
                <div>
                    <input type="radio" id="Si" name="unlimited" value="Si" checked onclick="display_fecha(1)">
                    <label for="huey">Si</label>
                    <input type="radio" id="No" name="unlimited" value="No" onclick="display_fecha(0)">
                    <label for="dewey">No</label>
                </div>
                <div id="div_fecha" style="display: none;">
                    <p>Fecha expiración</p>
                    <input name="fecha" type="date" id="fecha" placeholder="Fecha expiración..."></input>
                </div>
                <p>Seleccione el establecimiento</p>
                <select class="form-control" id="restaurante" name="restaurante">
                    <option selected disabled value="">Seleccione su restaurante</option>
                </select>
            </div>
       
        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_promo()">
            Registrar promocion
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UNA PROMOCIÓN -->
    <div id="actualizar" class="actualizar" style="display: none;"> 
        <h1> ACTUALIZA UNA PROMOCIÓN</h1>
        <button onclick="closeUpdate()">CANCELAR</button>
             
            <div>
                <input type="hidden" name="id_promo" id="id_promo" readonly>
                <p>Icono de la promoción</p>
                <select id="iconosa"></select>
                <p>Nombre de la promoción</p>
                <input name="nombrea" type="text" id="nombrea"></input>
                <p>Premio</p>
                <input name="premioa" type="text" id="premioa"></input>
                <p>Estampados máximos</p>
                <input name="sellosa" type="number" id="sellosa" readonly></input>
                <p>La promoción será ilimitada?</p>
                <div>
                    <input type="radio" id="Sia" name="unlimiteda" value="Si" onclick="display_fechaa(1)">
                    <label for="yes">Si</label>
                    <input type="radio" id="Noa" name="unlimiteda" value="No" onclick="display_fechaa(0)">
                    <label for="not">No</label>
                </div>
                <div id="div_fechaa" style="display: none;">
                    <p>Fecha expiración</p>
                    <input name="fechaa" type="date" id="fechaa"></input>
                </div>
                <p>Establecimiento</p>
                <input type="text" id="restaurantea" name="restaurantea" readonly>
                <p>Usuario</p>
                <input name="emaila" type="email" id="emaila" readonly></input>
            </div>
       
        <button type="submit" id="submit" class="btn btn-warning" onclick="actualizar_promo()">
            Actualizar promocion
        </button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS PROMOCIONES -->
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
                    <th>Nº sellos</th>
                    <th>Premio</th>
                    <th>Nombre</th>
                    <th>Local</th>
                    <th>Usuario</th>
                    <th>Expiracion</th>
                    <th>Ilimitada</th> 
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Status</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr>
                    <th> <input type="number" name="f_sellos" id="f_sellos" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_premio" id="f_premio" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_local" id="f_local" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_email" id="f_email" onkeyup="ver_promociones()"> </th>
                    <th> </th>
                    <th> <select class="form-control" id="f_ilimitada" name="f_ilimitada" onchange="ver_promociones()">
                            <option selected value="">-</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                         </select> 
                    </th>
                    <th> </th>
                    <th> </th>
                    <th><select class="form-control" id="f_status" name="f_status" onchange="ver_promociones()">
                            <option selected value="">-</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                         </select> 
                    </th>
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

    <script src="js/crud_local_promociones.js"></script>
</body>
</html>