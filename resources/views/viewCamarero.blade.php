<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/navCamarero.css')}}">
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <!-- <script src="cam_libreria/prueba.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="js/instascan.js"></script>
    <script src="js/instascan.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://webrtc.github.io/adapter/adapter-latest.js"></script> -->
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="{{asset('css/camarero.css')}}">
    <script src="cam_libreria/html5-qrcode-scanner.js"></script>
    <script src="cam_libreria/html5-qrcode.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#menu_on').click(function() {
            $('body').toggleClass('visible_menu');
        })
    });
    </script>
    <title>Camarero</title>
    <!-- <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
</head>
<style>
#reader__status_span{
    display: none;
}
#reader__dashboard_section_csr{
    margin-top: -10%;
}
#buscar_cam{
    background-color: transparent;
}
</style>
<body>

    <section>
        <header id="#header">
            <p class="text-start">{{ session('name') }}</p>
            <div style="width: 400px; height: 50px; margin-top:-18%;  margin-left:-30%" id="reader">
    </div>
            <a id="menu_on" onclick="closeModal2()">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </header>
        <nav>
            <ul>
                <div class="profile">
                    <i class="fas fa-user" style="float: left;"></i>
                    <a href="#">
                        Perfil del usuario
                    </a>
                </div>
                <div class="profile">
                    <i class="fas fa-moon" style="float: left;"></i>
                    <a href="#">
                        Modo noche
                    </a>
                </div>
                <form method="get" action="{{url('/cerrar_sesion')}}">
                    <button type="submit" id="cerrar" class="fas fa-sign-out-alt">
                    </button>
                    <button type="submit" id="sesion">Cerrar Sesion</button>
                </form>
            </ul>
        </nav>
    </section>

    <div id="content">
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
                <strong class="mr-auto">¡QR válido!</strong><br>
                <!-- Tiempo del Evento realizado -->
                <!-- <?php 
                    $fecha = date('d-m-Y');   
                    echo "<small>".$fecha."</small>";             
                ?> -->
        </div>
        <div id="modal2" class="modal">
            <div class="modal-content">
                <button class="close" onclick="closeModal()" data-dismiss="modal">&times;</button>
                <video id="preview" class="video-back" width="100%" height="100%" playsinline style="display: none;"></video>
            </div>
        </div>
        <!-- PROMOCIONES DEL CAMARERO -->
        <div id="promociones"></div>
    </div>

    <input class="form-control col-xs-1" id="content" type="hidden">
    <input class="form-control col-xs-1" id="ecc" type="hidden" value="M">
    <input class="form-control col-xs-1" id="size" type="hidden" value="5">
    <div id="modal" class="modal">
        <div class="modal-content">
            <button type="button" class="close" onclick="closeModal2()" data-dismiss="modal">&times;</button>
            <div class="showQRCode"></div>
        </div>
    </div>
    <script src="js/camarero.js"></script>
    <script src="js/camara_c.js"></script>

</br>
</br>
</br>


</body>
</html>
