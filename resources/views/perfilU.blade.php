<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <title>FIDELITIO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/cardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/listLocal.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/perfilU.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="js/historial.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#menu_on').click(function() {
                $('body').toggleClass('visible_menu');
            })
        });
    </script>
</head>

<body>
    <input type="hidden" id="pagina" value="viewCliente">
    <div id="wrapper">
        <section>
            <header id="#header">
                <a class="fas fa-home" id="list" href="{{url('/viewCliente')}}">
                </a>
                 <h1 id="admi">Perfil Usuario</h1>
                <div id="menu_on">
                    <i class="far fa-user-circle" style="float: left;"></i>
                </div>
            </header>
            <nav>
                <ul>
                    <!-- <div class="profile">
                        <i class="fas fa-user" id="icono"></i>
                        <a href="{{url('/perfilU')}}" id="link">
                            Perfil del usuario
                        </a>
                    </div> -->
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
        </section>
        <div id="content">
            <div id="card">
                <div class="col-sm-4">
                    <div class="card-block text-center">
                        <div class="m-b-25"> 
                            <img src="https://img.icons8.com/bubbles/100/000000/user.png"> 
                        </div>
                        <p class="font-italic">{{session('name')}}</p>
                        <button type="submit" id="editarP">Editar perfil</button>
                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                    </div>
                </div>
                <div class="card-block col-sm-8">
                    <h6 class="m-b-20 p-b-5">Mis datos</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10">Nombre</p>
                            <h6 class="text-muted">Sergio</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Email</p>
                            <h6 class="text-muted">rntng@gmail.com</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Teléfono</p>
                            <h6 class="text-muted">98979989898</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Género</p>
                            <h6 class="text-muted">98979989898</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Contraseña</p>
                            <h6 class="text-muted">98979989898</h6>
                        </div>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default" >Opciones</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10">Recent</p>
                            <h6 class="text-muted">Sam Disuja</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
