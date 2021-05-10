function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});
scanner.addListener('scan', function(content) {
    //alert('Contenido: ' + content);
    sellar(content);
});


function openCamara() {
    Instascan.Camera.getCameras().then(cameras => {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error("No existe cámara en el dispositivo!");
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

    closeCamara();
    document.getElementById('modal2').style.display = "none";
    //showCard();
}

function sellar(content) {
    const array = content.split(',');
    //alert(array[1]);
    var id_promo = array[2];
    var id_camarero = array[3];
    //alert(array[2]);
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
        // console.log(fecha_actual)
        // console.log(fecha_qr)
    if (year != "") {
        if (fecha_actual.getTime() < fecha_qr.getTime()) {
            //alert('qr valido')
            closeCamara();
            read();
        } else {
            closeCamara();
            document.getElementById('expirado').innerHTML = "Holaaa";
        }
    } else {
        alert('Este QR no es valido')
            // Msg error
    }
    // if(year!=""){
    //     if (year < year_now) {
    //     alert('QR CADUCADO');
    //     } else if (year <= year_now && month < month_now) {
    //         alert('QR CADUCADO');
    //     } else if (year <= year_now && month <= month_now && day < day_now) {
    //         alert('QR CADUCADO');
    //     } else if (year <= year_now && month <= month_now && day <= day_now && hour < hour_now) {
    //         alert('QR CADUCADO');
    //     } else if (year <= year_now && month <= month_now && day <= day_now && hour == hour_now && minute <= minute_now) {
    //         alert('QR CADUCADO');
    //     } else if (year <= year_now && month <= month_now && day <= day_now && hour == hour_now && minute > minute_now) {
    //         alert('QR valido');
    //         closeCamara();
    //         closeModal();
    //         // Ajax
    //         read();
    //     }else{
    //         alert('Este QR no es valido')
    //         // Msg error
    //     }
    //}

    function read() {
        // var section = document.getElementById('section-3');
        var ajax = new objetoAjax();
        var token = document.getElementById('token').getAttribute('content');
        // Busca la ruta read y que sea asyncrono
        ajax.open('POST', 'validarQR', true);
        var datasend = new FormData();
        datasend.append('_token', token);
        datasend.append('id_promo', id_promo);
        datasend.append('id_camarero', id_camarero);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var respuesta = JSON.parse(ajax.responseText);
                // var tabla = '';
                alert(respuesta);
                // section.innerHTML = tabla;
                showCard();
            }
        }
        ajax.send(datasend);
    }

    // Hacer llamada AJAX al método de validación QR

    // if (fecha_actual.getTime() < fecha_qr.getTime()) {
    //     alert('QR CADUCADO');
    //  }
    //alert(id_local);
    // var token = document.getElementById("token").getAttribute("content");
    // var ajax = new objetoAjax();
    // ajax.open('POST', 'ver_promociones', true);
    // var datasend = new FormData();
    // datasend.append('id_local', id_local);
    // datasend.append('_token', token);
    //alert('Contenido: ' + content);
}