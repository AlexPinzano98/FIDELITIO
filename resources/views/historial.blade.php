<!DOCTYPE html>
<html leng="es">

<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="utf-8">
    <title>Historial | STIMPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/cardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/listLocal.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/historial.css')}}">
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
    
    <section>
        <header id="#header">
            <a class="fas fa-wallet" id="list" href="{{url('/viewCliente')}}">
            </a>
            <h1 id="admi">Historial</h1>
            <div id="menu_on" onclick="closeModal2()">
                <i class="far fa-user-circle" style="float: left;"></i>
            </div>
        </header>
        <nav>
                <div class="profile">
                    <i class="fas fa-user" id="icono"></i>
                    <a href="{{url('/perfilU')}}" id="link">
                        Perfil del usuario
                    </a>
                </div>
                <!-- <div class="profile">
                    <i class="fas fa-history" id="icono"></i>
                    <a href="{{url('/historial')}}" id="link">
                        Historial
                    </a>
                </div> -->
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
        </nav>
    </section>
    
    <div id="content">
        <!-- DIV QUE SE RELLENA CON LOS DATOS DEL HISTORIAL -->
        <div id="historial" style="overflow-x:auto;">
        </div>
    </div>
    

</body>

</html>
