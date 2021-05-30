<!DOCTYPE html>
<html lang="es">

<head>
<link rel="icon" type="image/png" href="img/iconos/stimpaicon.png">
    <meta charset="utf-8">
    <title>Tarjetas | STIMPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/cardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">
    <link rel="stylesheet" href="{{asset('css/listLocal.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="js/instascan.js"></script>
    <script src="js/instascan.min.js"></script>
    <script src="js/infoCardsAjax.js"></script>
    <script type="text/javascript" src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
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
                <form method="get" id="views">
                    <button  class="fas fa-star" id="list" onclick="controladores(1); return false">
                    </button>
                    <button  class="fas fa-wallet" id="list" onclick="controladores(0); return false">
                    </button>
                </form>
                <div id="cam">
                    <img src="img/qr-code.png" onclick="openCamara()" id="camara">
                </div>
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
        </section>
        <div id="listCartas">
            <div class="swiper-container" id="content">
                <!-- MENSAJE DE ERROR -->
                <div role="alert" id="expirado" aria-live="assertive" aria-atomic="true" class="toast">
                    <!-- Botón para Cerrar el Toast -->
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Cerrar" onclick="cerrarToast()">
                        <span aria-hidden="true">×</span>
                    </button>
                    <!-- Icono / Logo de la Aplicación -->
                    <img src="img/lStimpa.png" class="rounded mr-2">
                    <!-- Nombre de la Aplicación -->
                    <strong class="mr-auto">¡QR no válido!</strong><br>
                    <!-- Tiempo del Evento realizado -->
                    <!-- <?php
                        $fecha = date('d-m-Y');
                        echo "<small>".$fecha."</small>";
                    ?> -->
                </div>
                <!-- MENSAJE VALIDO -->
                <div role="alert" id="valido" aria-live="assertive" aria-atomic="true" class="toast">
                        <!-- Botón para Cerrar el Toast -->
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Cerrar" onclick="cerrarValido()">
                            <span aria-hidden="true">×</span>
                        </button>
                        <!-- Icono / Logo de la Aplicación -->
                        <img src="img/lStimpa.png" class="rounded mr-2">
                        <!-- Nombre de la Aplicación -->
                        <strong class="mr-auto" id="val"></strong><br>
                        <!-- Tiempo del Evento realizado -->
                        <!-- <?php
                            $fecha = date('d-m-Y');
                            echo "<small>".$fecha."</small>";
                        ?> -->
                </div>
                <div class="swiper-wrapper" id="swiperStyle">
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content">
            <button id="close" class="close" onclick="closeModal()" data-dismiss="modal">&times;</button>
            <video id="preview" class="video-back" width="100%" height="100%" playsinline style="display: none;"></video>
        </div>
    </div>
    <script src="js/card.js"></script>

    <div class="container" id="listLocales">
        <div id="listLocal">
        </div>
    </div>

    <div class="checkbox" id="checkboxFiltro">
        <input type="checkbox" id="soloactivas" onchange="showCard()">
        <label for="soloactivas"> Solo activas</label><br>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <input class="form-control col-xs-1" id="content" type="hidden">
    <input class="form-control col-xs-1" id="ecc" type="hidden" value="M">
    <input class="form-control col-xs-1" id="size" type="hidden" value="5">
    <div id="modal" class="modal">
        <div class="modal-content">
            <button type="button" id="close" class="close" onclick="closeModal2()" data-dismiss="modal">&times;</button>
            <!-- <p>Enseña este QR al camarero para canjear tu premio!</p> -->
            <div class="showQRCode"></div>
        </div>
    </div>

</body>

</html>
