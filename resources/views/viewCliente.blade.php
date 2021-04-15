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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="js/infoCardsAjax.js"></script>
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
<div id="wrapper">
	<section>
	<header id="#header">
        <p class="text-start">Pablo Soriano</p>
        <button class="fas fa-camera">
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
            <div class="profile">
            <form method="get" action="{{url('/cerrar_sesion')}}">
                <button type="submit" style="font-size:130%"><i class="fas fa-sign-out-alt" style="float:left; padding-left: 20%;"></i></button>
                <button type="submit">Cerrar Sesion</button>
            </form>
            </div>
		</ul>
	</nav>
    </section>
    <!-- Swiper -->
    <div class="swiper-container" id="content">
        <form method="get" action="{{url('/cerrar_sesion')}}">
            <button class="fas fa-home" id="home">
            </button>
        </form>
        <form method="get" action="{{url('/cerrar_sesion')}}">
            <button class="fas fa-list-ul" id="list">
            </button>
        </form>
        <div class="swiper-wrapper">
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->

</body>
</html>
