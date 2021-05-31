<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/crudPromociones.css')}}">
    <title>CRUD - PROMOCIONES | STIMPA</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $(document).ready(function() { 
            $('#menu_on').click(function() {
                $('body').toggleClass('visible_menu');
            })
        });
    </script>
</head>
<body>
    <header class="header">
        <p class="text-start">{{ session('name') }}</p>
        <a class="fas fa-users-cog" href="{{url('/viewAdm_LocalesCruds')}}" id="admi"></a>
        <div id="menu_on" onclick="closeModal2()">
            <i class="far fa-user-circle" style="float: left;"></i>
        </div>
    </header>
    <nav>
        <ul>
            <div class="profile">
                <i class="fas fa-user" id="icono"></i>
                <a href="{{url('/perfilU')}}" id="link">
                    Perfil del usuario
                </a>
            </div>
            <div class="profile">
                <i class="fas fa-history" id="icono"></i>
                <a href="{{url('/historial')}}" id="link">
                    Historial
                </a>
            </div>
            <!-- <div class="profile">
                <i class="fas fa-life-ring" id="icono"></i>
                <a href="{{url('/ayuda')}}" id="link">
                    Ayuda
                </a>
            </div>
            <div class="profile">
                <i class="fas fa-balance-scale" id="icono"></i>
                <a href="{{url('/terCon')}}" id="link">
                    Terminos y condiciones
                </a>
            </div>
            <div class="profile">
                <i class="fas fa-question-circle" id="icono"></i>
                <a href="{{url('/soporte')}}" id="link">
                    Soporte
                </a>
            </div> -->
            <form method="get" action="{{url('/cerrar_sesion')}}" id="cerSes">
                <button type="submit" id="cerrar" class="fas fa-sign-out-alt">
                </button>
                <button type="submit" id="sesion">Cerrar Sesion</button>
            </form>
        </ul>
    </nav>

    <div>
        <h1>Administración de promociones</h1>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UN ICONO -->
    <div id="newIcono" style="display: none;">
        <h1> Registrar icono </h1>
        <input type="text" name="icon_name" id="icon_name" placeholder="Nombre del icono..."><br><br>
        Icono canjeado<br>
        <input type="file" name="onimg" id="onimg" ><br><br>
        <div id="onprev"></div><br>
        Icono sin canjear<br>
        <input type="file" name="offimg" id="offimg" ><br><br>
        <div id="offprev"></div><br>
        <button id="registerIcon" class="btn btn-success">REGISTRAR</button>
        <button onclick="closeRegisterIcon()" class="btn btn-danger">CANCELAR</button>
        <div id="message1">
        </div>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UNA PROMOCIÓN -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> Registrar promoción </h1>
            <div>
            <!-- Select para escoger el icono y mostrarlos-->
                Icono de la promoción<br>
                <select id="iconos">
                </select>
                <div>
                    <img id="img_on_r" src="" style="width: 100px;">
                    <img id="img_off_r" src="" style="width: 100px;">
                </div>
                Nombre de la promoción
                <input name="nombre" type="text" id="nombre" placeholder="Nombre promo..."></input><br><br>
                Premio de la promoción
                <input name="premio" type="text" id="premio" placeholder="Premio..."></input><br><br>
                Número de sellos máximos (estampados)
                <input name="sellos" type="number" id="sellos" placeholder="Sellos máximos..."></input><br><br>
                La promoción será ilimitada?
                <div>
                    <input type="radio" id="Si" name="unlimited" value="Si" checked onclick="display_fecha(1)">
                    <label for="huey">Si</label>
                    <input type="radio" id="No" name="unlimited" value="No" onclick="display_fecha(0)">
                    <label for="dewey">No</label>
                </div>
                <div id="div_fecha" style="display: none;">
                    Fecha expiración
                    <input name="fecha" type="date" id="fecha" placeholder="Fecha expiración..."></input>
                </div><br>
                Seleccione el establecimiento
                <select class="form-control" id="restaurante" name="restaurante">
                    <option selected disabled value="">Seleccione su restaurante</option>
                </select><br>
            </div>
        <button type="submit" id="submit" class="btn btn-success">
            REGISTRAR
        </button>
        <button onclick="closeRegister()" class="btn btn-danger">CANCELAR</button>
        <div id="message2">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UNA PROMOCIÓN -->
    <div id="actualizar" class="actualizar" style="display: none;">
        <h1> Actualizar promocion</h1>
            <div>
                <input type="hidden" name="id_promo" id="id_promo" readonly>
                Icono de la promoción
                <select id="iconosa"></select><br><br>
                Nombre de la promoción
                <input name="nombrea" type="text" id="nombrea"></input><br><br>
                Premio
                <input name="premioa" type="text" id="premioa"></input><br><br>
                Estampados máximos
                <input name="sellosa" type="number" id="sellosa" readonly></input><br><br>
                La promoción será ilimitada?
                <div>
                    <input type="radio" id="Sia" name="unlimiteda" value="Si" onclick="display_fechaa(1)">
                    <label for="yes">Si</label>
                    <input type="radio" id="Noa" name="unlimiteda" value="No" onclick="display_fechaa(0)">
                    <label for="not">No</label>
                </div>
                <div id="div_fechaa" style="display: none;">
                    Fecha expiración
                    <input name="fechaa" type="date" id="fechaa"></input><br><br>
                </div>
                Establecimiento
                <input type="text" id="restaurantea" name="restaurantea" readonly><br><br>
                Usuario
                <input name="emaila" type="email" id="emaila" readonly></input><br><br>
            </div>
        <button type="submit" id="submita" class="btn btn-success">
            ACTUALIZAR
        </button>
        <button onclick="closeUpdate()" class="btn btn-danger">CANCELAR</button>
        <div id="message3">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS PROMOCIONES -->
    <div class="crud" id="content">
        <div class="datos">
            <button id="btn-register" onclick="openRegister()"><i class="fas fa-clone"></i>Añadir promoción</button>
            <button id="btn-register-icon" onclick="openRegisterIcons()"><i class="fas fa-magic"></i>Registrar Icono</button>
            <p id="total_datos"></p>
            <div class="bugR">
            <p id="num">Num de resultados</p>
                <select id="results" name="results" onchange="mostrar_datos()">
                    <option selected value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
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
            <div id="pag">
                <button id="prev" onclick="prev()"><i class="fas fa-arrow-left"></i>Anterior</button>
                <button id="next" onclick="next()">Siguiente<i class="fas fa-arrow-right"></i></button>
            </div>
            <p id="listado"></p>
        </div>
    </div>

    <script src="js/validateCrudPromociones.js"></script>
    <script src="js/crud_local_promociones.js"></script>
</body>
</html>
