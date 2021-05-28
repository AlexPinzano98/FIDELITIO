<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/crudTarjetas.css')}}">
    <title>CRUD - TARJETAS</title>
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
        <!-- <a class="fas fa-chart-bar" href="{{url('/viewMaster')}}" id="est"></a> -->
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
            <div class="profile">
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
            </div>
            <form method="get" action="{{url('/cerrar_sesion')}}" id="cerSes">
                <button type="submit" id="cerrar" class="fas fa-sign-out-alt">
                </button>
                <button type="submit" id="sesion">Cerrar Sesion</button>
            </form>
        </ul>
    </nav>

    <div>
        <h1>Administración de tarjetas</h1>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UNA TARJETA -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> Registrar tarjeta</h1>
        <div class="mb-3">
            Establecimiento:
            <input type="text" id="local" name="local" readonly>
        </div>
        <div class="mb-3">
            <select id="promo" name="promo"></select>
        </div>
        <div class="mb-3">
            <input name="email" type="text"  id="email" placeholder="Email..."></input>
        </div>
        <button type="submit" id="submit" class="btn btn-success" onclick="registrar_tarjeta()">
            REGISTRAR
        </button>
        <button onclick="closeRegister()" class="btn btn-danger">CANCELAR</button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UNA TARJETA -->
    <div id="actualizar" class="actualizar" style="display: none;">
        <h1> Actualizar tarjeta</h1>
        <input type="hidden" id="id_card" name="id_card">
        <div class="mb-3">
            Establecimiento:
            <input type="text" id="locala" name="locala" readonly>
        </div>
        <div class="mb-3">
            <input type="text" id="promoa" name="promoa" readonly>
        </div>
        <div class="mb-3">
            <input name="sellosa" type="number"  id="sellosa" readonly></input>
            <button onclick="addSello()">+</button>
        </div>
        <div class="mb-3">
            <input name="email" type="text"  id="emaila" readonly></input>
        </div>
        <div class="mb-3">
            Estado de la tarjeta:
            <select class="form-control" id="status_card" name="status_card" onchange="ver_tarjetas()">
                <option value="Activado">Activado</option>
                <option value="Caducado">Caducado</option>
                <option value="Canjeado">Canjeado</option>
            </select>
        </div>
        
        <button type="submit" id="submit" class="btn btn-success" onclick="actualizar_tarjeta()">
            ACTUALIZAR
        </button>
        <button onclick="closeUpdate()" class="btn btn-danger">CANCELAR</button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS TARJETAS -->
    <div class="crud" id="content">
        <div class="datos">
            <button id="btn-register" onclick="openRegister(); start()"><i class="far fa-credit-card"></i>Añadir tarjeta</button>
            <p id="total_datos"></p>
            <p id="num">Num de resultados</p>
            <select id="results" name="results" onchange="mostrar_datos()">
                <option selected value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
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
                        <th><input type="number" name="f_sellos" id="f_sellos" onkeyup="ver_tarjetas()"> </th>
                        <th><select class="form-control" id="f_status" name="f_status" onchange="ver_tarjetas()">
                                <option selected value="">-</option>
                                <option value="open">Open</option>
                                <option value="close">Close</option>
                            </select></th>
                        <th><input type="text" name="f_promo" id="f_promo" onkeyup="ver_tarjetas()"> </th>
                        <th><input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_tarjetas()"> </th>
                        <th></th>
                        <th></th>
                        <th> <select class="form-control" id="f_status_card" name="f_status_card" onchange="ver_tarjetas()">
                                <option selected value="">-</option>
                                <option value="Activado">Activado</option>
                                <option value="Caducado">Caducado</option>
                                <option value="Canjeado">Canjeado</option>
                            </select>
                        </th>
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

    <script src="js/validateCrudTarjeta.js"></script>
    <script src="js/crud_local_tarjetas.js"></script>
</body>
</html>
