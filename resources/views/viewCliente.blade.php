<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/cardStyle.css" />

    <!-- Demo styles -->
    <style>
    body {
        background: #fff;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        width: 300px;
    }
    </style>
</head>

<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card1">
                    <div class="card-body">
                        <img src="img/perfilPrueba.jpg" class="card-img-top" alt="perfil">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción café</p>
                    </div>
                    <h5 class="stamp-title">Sellos de la promoción</h5>
                    <div class="card-stamp_grid">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card2">
                    <div class="card-body">
                        <img src="img/perfilPrueba.jpg" class="card-img-top" alt="perfil">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción café</p>
                    </div>
                    <h5 class="stamp-title">Sellos de la promoción</h5>
                    <div class="card-stamp_grid">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card3">
                    <div class="card-body">
                        <img src="img/perfilPrueba.jpg" class="card-img-top" alt="perfil">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">promoción café</p>
                    </div>
                    <h5 class="stamp-title">Sellos de la promoción</h5>
                    <div class="card-stamp_grid">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
                        <img src="img/stamp.jpg" class="img-thumbnail" alt="sello">
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
