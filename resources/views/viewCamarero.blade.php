<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/camarero.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/camarero.css')}}">
    <title>Camarero</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>
</head>
<body>
    <!-- SCANER QR CAMARERO -->
    <button id="camara" onclick="openCamara()">CAMARA</button>
    <button id="camara" onclick="closeCamara()">CLOSE</button>

    <video id="preview" width="100%" height="100%" style="display: none;"></video>
    

    <!-- PROMOCIONES DEL CAMARERO -->
    <div id="promociones"></div>
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
