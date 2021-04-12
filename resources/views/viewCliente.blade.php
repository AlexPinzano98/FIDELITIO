<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/cardStyle.css" />
    <script src="js/infoCardsAjax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
</head>

<body>

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->


</body>

</html>
