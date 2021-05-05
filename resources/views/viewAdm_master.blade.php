<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="css/graficas.css">
    <title>ADMIN MASTER</title>
</head>

<body>
    <p>ESTADÍSTICAS</p>
    <a href="{{ url('/cruds') }}">CRUDS</a>
    <div id="gr">
        <div class="gr__item">
            <h5>Clientes/alta</h5>
            <select name="filter" id="filter" class="form-select">

                <option value="">Tiempo</option>
                <option value="dias">dias</option>
                <option value="mes">mes</option>
                <option value="ano">año</option>
            </select>
            <canvas id="myChart" width="100" height="90"></canvas>

            <!-- Button trigger modal -->
            <img src="img/info-circle.svg" alt="informacion" data-bs-toggle="modal" data-bs-target="#exampleModal">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gr__item">
            <h5>Clientes/Promoción/canjeado</h5>
            <select name="filter2" id="filter2" class="form-select">

                <option value="">Tiempo</option>
                <option value="dias">Dias</option>
                <option value="mes">Mes</option>
                <option value="ano">Año</option>
            </select>
            <select name="filter3" id="filter3" class="form-select">

                <option value="">Promoción</option>
                <option value=0>No canjeado</option>
                <option value=1>Canjeado</option>
            </select>
            <canvas id="myChart2" width="100" height="90"></canvas>

            <!-- Button trigger modal -->
            <img src="img/info-circle.svg" alt="informacion" data-bs-toggle="modal" data-bs-target="#exampleModal2">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gr__item">
            <h5>Clientes/promoción canjeada</h5>
            <select name="filter4" id="filter4" class="form-select">
                <option value="">Tiempo</option>
                <option value="dias">Dias</option>
                <option value="mes">Mes</option>
                <option value="ano">Año</option>
            </select>
            <canvas id="myChart3" width="100" height="90"></canvas>

            <!-- Button trigger modal -->
            <img src="img/info-circle.svg" alt="informacion" data-bs-toggle="modal" data-bs-target="#exampleModal3">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gr__item">
            <h5>Cafes consumidos</h5>
            <canvas id="myChart4" width="100" height="90"></canvas>

            <!-- Button trigger modal -->
            <img src="img/info-circle.svg" alt="informacion" data-bs-toggle="modal" data-bs-target="#exampleModal4">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script src="js/graficasAjax.js"></script>

</body>

</html>
