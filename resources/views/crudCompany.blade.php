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
        <h1>Administración de compañias</h1>
    </div>

    <!-- FORMULARIO PARA REGISTRAR UN LOCAL -->
    <div id="registrar" class="registrar" >
        <h1> REGISTRA UNA COMPAÑIA</h1>
            
            <div>
                <p>Nombre de la compañia</p>
                <input name="nombre" type="text" id="nombre" placeholder="Nombre..."></input>
            </div>
        

        <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_company()">
            Registrar compañia
        </button>
        <button onclick="closeRegister()" class="btn btn-danger">CANCELAR</button>
        <div id="message">
        </div>
        <p id="error"> {{Session::get('message')}} </p>
    </div>

    <div class="crud" id="content">
    <div class="datos">
        <p id="total_datos"></p>
        <div class="bugR">
            <select id="results" name="results" onchange="mostrar_datos()">
                <option selected value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                </tr>
                <tr>
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
    </div>

    <script src="js/crud_master_company.js"></script>
</body>
</html>