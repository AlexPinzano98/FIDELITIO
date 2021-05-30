<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="img/iconos/stimpaicon.png"> 
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/listLocal.css">
    <script src="js/infoCardsAjax.js"></script>
    <!-- <link rel="stylesheet" href="{{asset('css/cliente.css')}}"> -->
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript">
    // A $( document ).ready() block.
    $(document).ready(function() {
        $('#menu_on').click(function() {
            $('body').toggleClass('visible_menu');
        })
    });
    </script> -->
</head>

<body>
<!-- <input type="hidden" id="pagina" value="viewListLocal"> -->
    <!-- <header id="#header">
		<a href="#" id="menu_on">
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
	</nav> -->
    <div class="container">
        <div id="list">
        </div>
    </div>
    <div class="swiper-wrapper">
        </div>
        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
