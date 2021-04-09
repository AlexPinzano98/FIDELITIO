<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/cardStyle.css" />
</head>

<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card1">
                    <div class="card-body">
                        <img src="img/cafe.png" class="card-img-top" alt="perfil">
                    </div>
                    <div class="card-stamp">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción café</p>
                        <h5 class="stamp-title">Sellos de la promoción</h5>
                        <div class="card-stamp_grid">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card2">
                    <div class="card-body">
                        <img src="img/bocadillo.png" class="card-img-top" alt="perfil">
                    </div>
                    <div class="card-stamp">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción bocadillo</p>
                        <h5 class="stamp-title">Sellos de la promoción</h5>
                        <div class="card-stamp_grid">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                            <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card3">
                    <div class="card-body">
                        <img src="img/imgPerfilNull.png" class="card-img-top" alt="perfil">
                    </div>
                    <div class="card-stamp">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción plato</p>
                        <h5 class="stamp-title">Sellos de la promoción</h5>
                        <div class="card-stamp_grid">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">
                            <img src="img/utensils.svg" class="img-thumbnail" alt="sello">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
    </script>
</body>

</html>
