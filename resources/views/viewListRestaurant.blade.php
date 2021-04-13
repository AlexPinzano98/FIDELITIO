<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/listRestaurant.css">
    <link rel="stylesheet" href="{{asset('css/cliente.css')}}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
    // A $( document ).ready() block.
    $(document).ready(function() {
        $('#menu_on').click(function() {
            $('body').toggleClass('visible_menu');
        })
    });
    </script>
</head>

<body>
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
            <div class="item">
                <div>
                    <img src="img/imgPerfilNull.png" alt="perfilRestaurant">
                </div>
                <div>
                    <h5>Restaurante 1</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto deserunt adipisci natus
                    </p>
                </div>
                <div>
                    <button type="button">
                        <img src="img/caret-right.svg" alt="play">
                    </button>
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="img/imgPerfilNull.png" alt="perfilRestaurant">
                </div>
                <div>
                    <h5>Restaurante 2</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto deserunt adipisci natus
                    </p>
                </div>
                <div>
                    <button type="button">
                        <img src="img/caret-right.svg" alt="play">
                    </button>
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="img/imgPerfilNull.png" alt="perfilRestaurant">
                </div>
                <div>
                    <h5>Restaurante 3</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto deserunt adipisci natus
                    </p>
                </div>
                <div>
                    <button type="button">
                        <img src="img/caret-right.svg" alt="play">
                    </button>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
