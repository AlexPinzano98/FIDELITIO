<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/crudTarjetas.css')}}">
    <title>CRUD - TARJETAS | STIMPA</title>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#menu_on').click(function() {
                $('body').toggleClass('visible_menu');
            })
        });
    </script>
</head>
<body >
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
        <h1>Administración de establecimientos</h1>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UN LOCAL -->
    <div id="registrar" class="registrar" style="display: none;">
        <h1> REGISTRA UN ESTABLECIMIENTO</h1>
            <div>
                <p>LOCAL</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre del establecimiento..."></input>
                
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
            Registrar local
        </button>
        <button onclick="closeRegister()" class="btn btn-danger">CANCELAR</button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <!-- FORMULARIO PARA ACTUALIZAR UN LOCAL -->
    <div id="actualizar" class="actualizar" style="display: none;">
        <h1> ACTUALIZA UN ESTABLECIMIENTO</h1>
            <div>
                <input type="hidden" name="id_local" id="id_local" readonly>
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
            Actualizar local
        </button>
        <button onclick="closeUpdate()" class="btn btn-danger">CANCELAR</button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>


    <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LAS LOCALES -->
    <div class="crud" id="content">
    <div class="datos">
        <button id="btn-register" onclick="openRegister()"><i class="fas fa-clone"></i>Añadir local</button>
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
        <div id="pag">
            <button id="prev" onclick="prev()"><i class="fas fa-arrow-left"></i>Anterior</button>
            <button id="next" onclick="next()">Siguiente<i class="fas fa-arrow-right"></i></button>
        </div>
        <p id="listado"></p>
    </div>
    </div>

    <script src="js/crud_master_locales.js"></script>
</body>
</html>