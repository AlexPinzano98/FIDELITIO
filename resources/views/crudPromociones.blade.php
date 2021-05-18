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
    <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO -->
    <div>
        <h1>Registra una nueva promocion</h1>
        <button id="btn-register" onclick="openRegister()">REGISTRAR!</button>
    </div>
 
    <!-- FORMULARIO PARA REGISTRAR UNA PROMOCIÓN -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> REGISTRA UNA PROMOCIÓN </h1>
        <button onclick="closeRegister()">CANCELAR</button>
             
            <div>
                <p>Nombre promoción</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre promo..."></input>
                <p>Premio</p>
                <input name="premio" type="text" id="premio" placeholder="Premio..."></input>
                <p>Estampados máximos</p>
                <input name="sellos" type="number" id="sellos" placeholder="Sellos máximos..."></input>
                <p>Fecha expiración</p>
                <input name="fecha" type="date" id="fecha" placeholder="Fecha expiración..."></input>

                <p>Restaurante</p>
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
        <button onclick="closeRegister()">CANCELAR</button>
             
            <div>
                <p>Nombre promoción</p>
                <input name="nombrea" type="text" id="nombrea" placeholder="Nombre promo..."></input>
                <p>Premio</p>
                <input name="premioa" type="text" id="premioa" placeholder="Premio..."></input>
                <p>Estampados máximos</p>
                <input name="sellosa" type="number" id="sellosa" placeholder="Sellos máximos..."></input>
                <p>Fecha expiración</p>
                <input name="fechaa" type="date" id="fechaa" placeholder="Fecha expiración..."></input>

                <p>Restaurante</p>
                <select class="form-control" id="restaurantea" name="restaurantea">
                    <option selected disabled value="">Seleccione su restaurante</option>
                </select>
                <p>Email</p>
                <input name="emaila" type="email" id="emaila" placeholder="Email..."></input>
            </div>
       
        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_promo()">
            Registrar promocion
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
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nº sellos</th>
                    <th>Premio</th>
                    <th>Nombre</th>
                    <th>Expiracion</th>
                    <th>Ilimitada</th>
                    <th>Local</th>
                    <th>Usuario</th>
                    <th>Status</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th> <input type="number" name="f_sellos" id="f_sellos" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_premio" id="f_premio" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_promociones()"> </th>
                    <th> <input type="date" name="f_fecha" id="f_fecha" onkeyup="ver_promociones()"> </th>
                    <th> <select class="form-control" id="f_ilimitada" name="f_ilimitada" onclick="ver_promociones()">
                            <option selected value="">-</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                         </select> 
                    </th>
                    <th> <input type="text" name="f_local" id="f_local" onkeyup="ver_promociones()"> </th>
                    <th> <input type="text" name="f_email" id="f_email" onkeyup="ver_promociones()"> </th>
                    <th><select class="form-control" id="f_status" name="f_status" onclick="ver_promociones()">
                            <option selected value="">-</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                         </select> 
                    </th>
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

    <script src="js/crud_master_promociones.js"></script>
</body>
</html>