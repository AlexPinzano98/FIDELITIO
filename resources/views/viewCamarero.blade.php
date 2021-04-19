<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/navCamarero.css')}}">
    <script src="js/camarero.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/camarero.css')}}">
    <script type="text/javascript">
    $(document).ready(function() {
        $('#menu_on').click(function() {
            $('body').toggleClass('visible_menu');
        })
    });
    </script>
    <title>Camarero</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>

    <section>
        <header id="#header">
            <p class="text-start">Pablo Soriano</p>
            <button class="fas fa-camera" onclick="openCamara()" id="cam">
            </button>
            <a id="menu_on">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </header>
        <nav>
            <ul>
                <div class="profile">
                    <i class="fas fa-user" style="float: left; padding-left: 4%;"></i>
                    <a href="#">
                        Perfil del usuario
                    </a>
                </div>
                <div class="profile">
                    <i class="fas fa-moon" style="float: left; padding-left: 4%;"></i>
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
        <!-- SCANER QR CAMARERO -->
        <button id="camara" onclick="openCamara()">CAMARA</button>
        <button id="camara" onclick="closeCamara()">CLOSE</button>

        <video id="preview" width="100%" height="100%" style="display: none;"></video>

        <!-- PROMOCIONES DEL CAMARERO -->
        <div id="promociones"></div>
    </div>

    <input class="form-control col-xs-1" id="content" type="hidden">
    <input class="form-control col-xs-1" id="ecc" type="hidden" value="M">
    <input class="form-control col-xs-1" id="size" type="hidden" value="5">
    <div id="modal" class="modal">
        <div class="modal-content">
            <button type="button" class="close btn" onclick="closeModal()" data-dismiss="modal">&times;</button>
            <div class="showQRCode"></div>
        </div>
    </div>



    <script src="js/camarero.js"></script>
    <script src="js/camara_c.js"></script>
</body>

</html>
