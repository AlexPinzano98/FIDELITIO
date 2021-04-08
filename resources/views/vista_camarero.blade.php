<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/camarero.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Camarero</title>
</head>
<body>
<div id="promociones"></div>
<div class="visible-print text-center">
<!-- {!! QrCode::size(100)->generate(Request::url()); !!} -->
    {!! QrCode::color(255, 0, 0)->style('round')->size(100)->generate(Request::url()); !!}
    <p>Escanéame para volver a la página principal.</p>
</div>
</body>
</html>