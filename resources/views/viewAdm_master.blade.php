<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="css/graficas.css">
    <title>ADMIN MASTER</title>
</head>

<body>
    <p>ESTADÍSTICAS</p>
    <a href="{{ url('/cruds') }}">CRUDS</a>
    <div id="gr">
        <div class="gr__item">
            <canvas id="myChart" width="100" height="90"></canvas>
        </div>
        <div class="gr__item">
            <canvas id="myChart2" width="100" height="90"></canvas>
        </div>
        <div class="gr__item">
            <canvas id="myChart3" width="100" height=90"></canvas>
        </div>
        <div class="gr__item">
            <canvas id="myChart4" width="100" height="90"></canvas>
        </div>
    </div>
   <script src="js/graficasAjax.js"></script>

</body>

</html>
