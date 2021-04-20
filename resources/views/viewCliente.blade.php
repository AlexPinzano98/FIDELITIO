<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FIDELITIO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/cardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">
    <link rel="stylesheet" href="{{asset('css/listLocal.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>
    <script src="js/infoCardsAjax.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
		$( document ).ready(function() {
		    $('#menu_on').click(function(){
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
        <p class="text-start">{{ session('name') }}</p>
        <button class="fas fa-camera" onclick="openCamara()" id="camara">
        </button>
		<a id="menu_on" onclick="closeModal2()">
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
    <!-- Swiper -->
    <div id="listCartas">
    <div class="swiper-container" id="content">
        <form method="get">
            <button class="fas fa-home" id="home" onclick="controladores(0); return false">
            </button>
        </form>
        <form method="get">
            <button class="fas fa-list-ul" id="list" onclick="controladores(1); return false">
            </button>
        </form>
        <div class="swiper-wrapper" id="swiperStyle">
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    </div>
</div>
<div id="modal2" class="modal">
<div class="modal-content">
<button class="close" onclick="closeModal()" data-dismiss="modal">&times;</button>
<video id="preview" width="100%" height="100%" style="display: none;"></video>
</div>
</div>
    <script src="js/card.js"></script>
    
    <div class="container" id="listLocales">
        <div id="listLocal">
        </div>
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
<button type="button" class="close" onclick="closeModal2()" data-dismiss="modal">&times;</button>
<!-- <p>Enseña este QR al camarero para canjear tu premio!</p> -->
<div class="showQRCode"></div>
</div>
</div>

</body>
</html>
