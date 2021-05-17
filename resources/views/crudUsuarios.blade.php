<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Data table -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
    <title>CRUD - USUARIOS</title>
    <link rel="stylesheet" href="{{asset('css/crudUsuarios.css')}}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">

</head>

<body>
    <header class="header">
        <p class="text-start">{{ session('name') }}</p>
        <button class="fas fa-chart-bar" action="{{url('/viewAdm_master')}}" id="est"></button>
        <button class="fas fa-users-cog" onclick="openCamara()" id="admi"></button>
        <a id="menu_on" onclick="closeModal2()">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </header>

        <h1>USUARIOS</h1>

        <!-- BOTÓN PARA ACTIVAR EL FORMULARIO DE REGISTRO -->
        <div>
            <h1>Administración de usuarios</h1>
        </div>

        <!-- FORMULARIO PARA REGISTRAR UN USUARIO -->
        <div id="registrar" class="registrar" style="display: none;">
            <h1> REGISTRA UN USUARIO</h1>
            <button onclick="closeRegister()">CANCELAR</button>
            <div class="mb-3">
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre..."></input>
            </div>
            <div class="mb-3">
                <input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos..."></input>
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input name="psswd" type="password" class="form-control" id="psswd" placeholder="Contrasenya..."></input>
            </div>
            <div class="mb-3">
                <select class="form-control" id="sexo" name="sexo">
                    <option selected disabled value="">Seleccione su sexo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No especificar">No especificar</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" id="rol" name="rol">
                    <option selected disabled value="">Seleccione su rol</option>
                    <option value="1">Cliente</option>
                    <option value="2">Camarero</option>
                    <option value="3">Adm establecimiento</option>
                    <option value="4">Adm grupo</option>
                    <option value="5">Adm master</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <input type="checkbox" id="consentimiento" name="consentimiento" value="1">
                <label for="consentimiento" class="ms-2">Consentimiento</label>
            </div>
            <button type="submit" id="submit" class="btn btn-warning" onclick="registrar_usuario()">
                Registrar usuario
            </button>
            <div id="message">
            </div>
            <p id="error"> {{Session::get('message')}} </p>
        </div>

        <!-- FORMULARIO PARA MODIFICAR/ACTUALIZAR UN USUARIO -->
        <div id="actualizar" class="actualizar" style="display: none;">
            <h1>ACTUALIZA UN USUARIO</h1>
            <button onclick="closeUpdate()">CANCELAR</button>
            <input name="id_user" id="id_user" readonly>
            <div class="mb-3">
                <input name="nombre" type="text" class="form-control" id="nombrea" placeholder="Nombre..."></input>
            </div>
            <div class="mb-3">
                <input name="apellidos" type="text" class="form-control" id="apellidosa" placeholder="Apellidos..."></input>
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" id="emaila" placeholder="Correo electrónico...">
            </div>
            <div class="mb-3">
                <input name="psswd" type="password" class="form-control" id="contrasenyaa" placeholder="Contrasenya..."></input>
            </div>
            <div class="mb-3">
                <select class="form-control" id="sexoa" name="sexo">
                    <option selected disabled value="">Selecciona tu sexo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No especificar">No especificar</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-control" id="rola" name="rol">
                    <option selected disabled value="">Seleccione su rol</option>
                    <option value="1">Cliente</option>
                    <option value="2">Camarero</option>
                    <option value="3">Adm establecimiento</option>
                    <option value="4">Adm grupo</option>
                    <option value="5">Adm master</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <input type="checkbox" id="consentimientoa" name="consentimiento" value="1">
                <label for="consentimiento" class="ms-2">Consentimiento</label>
            </div>
            <button type="submit" id="submita" class="btn btn-warning" onclick="actualizar_usuario()">
                Actualizar
            </button>
            <div id="message">
            </div>
            <p id="error"> {{Session::get('message')}} </p>
        </div>

        <!-- TABLA QUE CONTENDRÁ TODOS LOS DATOS DE LOS USUARIOS -->
    <div id="crud">
        <div class="datos">
            <table id="tablax">
            <button id="btn-register" onclick="openRegister()">REGISTRAR</button>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Género</th>
                        <th>Confidencialidad</th>
                        <th>Rol</th>
                        <th>Status</th>
                        <th colspan="2">Acciones</th>
                        </tr>
                    <tr>
                        <th></th>
                        <th><input type="text" name="f_nombre" id="f_nombre" onkeyup="ver_usuarios()"></th>
                        <th><input type="text" name="f_apellidos" id="f_apellidos" onkeyup="ver_usuarios()"> </th>
                        <th><input type="text" name="f_email" id="f_email" onkeyup="ver_usuarios()"></th>
                        <th><select class="form-control" id="f_sexo" name="f_sexo" onchange="ver_usuarios()">
                                <option selected value="">-</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </th>
                        <th> <select class="form-control" id="f_conf" name="f_conf" onchange="ver_usuarios()">
                                <option selected value="">-</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </th>
                        <th><select class="form-control" id="f_rol" name="f_rol" onchange="ver_usuarios()">
                                <option selected value="">-</option>
                                <option value="1">Cliente</option>
                                <option value="2">Camarero</option>
                                <option value="3">Adm establecimiento</option>
                                <option value="4">Adm grupo</option>
                                <option value="5">Adm master</option>
                            </select>
                        </th>
                        <th><select class="form-control" id="f_status" name="f_status" onchange="ver_usuarios()">
                                <option selected value="">-</option>
                                <option value="Activo">Activo</option>
                                <option value="Inhabilitado">Inhabilitado</option>
                            </select>
                        </th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="datos">
                </tbody>
            </table>
        </div>
    </div>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script> -->
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="js/crud_master_usuarios.js"></script>
</body>
</html>
