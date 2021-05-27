let scanner = new Instascan.Scanner({
    video: document.getElementById('preview'),
    scanPeriod: 4,
    mirror: false
});
scanner.addListener('scan', function(content) {
    sellar(content);
});

function openCamara() {
    Instascan.Camera.getCameras().then(cameras => {
        //If a camera is detected
        if (cameras.length > 0) {
            //If the user has a rear/back camera
            if (cameras[1]) {
                //use that by default
                scanner.start(cameras[1]);
            } else {
                //else use front camera
                scanner.start(cameras[0]);
            }
        } else {
            //if no cameras are detected give error
            console.error('No cameras found.');
        }
    });
    document.getElementById('modal2').style.display = "block";
    document.getElementById('preview').style.display = "block";
}

function closeCamara() {
    scanner.stop();
    document.getElementById('modal2').style.display = "none";
    document.getElementById('preview').style.display = "none";
}

function closeModal() {
    document.getElementById('modal2').style.display = "none";
    closeCamara();
}

function mostrarToast() {
    var toast = document.getElementById("expirado");
    toast.className = "mostrar";
    setTimeout(function() { toast.className = toast.className.replace("mostrar", ""); }, 5000);
}

function cerrarToast() {
    var toast = document.getElementById("expirado");
    toast.className = "cerrar";
    toast.className = toast.className.replace("cerrar", "");
}

function mostrarValido() {
    var toast = document.getElementById("valido");
    toast.className = "mostrar";
    setTimeout(function() { toast.className = toast.className.replace("mostrar", ""); }, 5000);
}

function cerrarValido() {
    var toast = document.getElementById("valido");
    toast.className = "cerrar";
    toast.className = toast.className.replace("cerrar", "");
}

function sellar(content) {
    const array = content.split(',');
    // no se usa
    var id_promo = array[2];
    var id_card = array[3];
    var year = array[4];
    var month = array[5];
    var day = array[6];
    var hour = array[7];
    var minute = array[8];
    var seconds = array[9];
    var now = new Date();
    var year_now = now.getFullYear();
    var month_now = now.getMonth() + 1;
    var day_now = now.getDate();
    var hour_now = now.getHours();
    var minute_now = now.getMinutes();
    var seconds_now = now.getSeconds();
    var fecha_qr = new Date(year, month, day, hour, minute, seconds)
    var fecha_actual = new Date(year_now, month_now, day_now, hour_now, minute_now, seconds_now)
    if (year != "") {
        if (fecha_actual.getTime() < fecha_qr.getTime()) {
            read();
            closeCamara();
        } else {
            closeCamara();
            mostrarToast();
        }
    } else {
        closeCamara();
        mostrarToast();
    }

    function read() {
        var ajax = new objetoAjax();
        var token = document.getElementById('token').getAttribute('content');
        // Busca la ruta read y que sea asyncrono
        ajax.open('POST', 'validarQRcamarero', true);
        var datasend = new FormData();
        datasend.append('_token', token);
        datasend.append('id_card', id_card);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var respuesta = JSON.parse(ajax.responseText);
                mostrarValido();
            }
        }
        ajax.send(datasend);
    }
}