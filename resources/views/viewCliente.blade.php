<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/cardStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/cliente.css')}}"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="js/infoCardsAjax.js"></script>
    <script src="https://kit.fontawesome.com/55e6be5a81.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
		// A $( document ).ready() block.
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
        <p class="text-start">nombreUsuario</p>
        <button class="container">
            <i class="fas fa-camera"></i>
        </button>
		<a id="menu_on">
			<span></span>
			<span></span>
			<span></span>
		</a>
	</header>
	<nav>
		<ul>
			<li><a href="#">Perfil del usuario</a></li>
			<li><a href="#">Modo noche</a></li>
			<li><a href="#">Cerrar sesión</a></li>
		</ul>
	</nav>
    </section>
    <!-- Swiper -->
    <div class="swiper-container" id="content">
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
