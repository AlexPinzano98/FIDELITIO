let scanner = new Instascan.Scanner(
    {
        video: document.getElementById('preview')
    }
);
scanner.addListener('scan', function(content) {
    alert('Contenido: ' + content);
    sellar(content); 
    // user: pablo, id promo (pos 2) + id carta (pos 3)
});

function openCamara(){
    Instascan.Camera.getCameras().then(cameras =>
    {
        if(cameras.length > 0){
            scanner.start(cameras[0]);
        } else {
            console.error("No existe cámara en el dispositivo!");
        }
    });
    document.getElementById('modal2').style.display = "block";
    document.getElementById('preview').style.display = "block";
}
function closeCamara(){
    scanner.stop();
    document.getElementById('modal2').style.display = "none";
    document.getElementById('preview').style.display = "none";
}
function closeModal() {
    document.getElementById('modal2').style.display = "none";
    closeCamara();
}
function sellar(content){
    const array = content.split(',');
    console.log(array)
    //console.log(array[2] + ' - ' + array[3]);

    var id_promo=array[2];
    var id_camarero=array[3];
    //alert(array[2]);
    var year=array[4];
    var month=array[5];
    var day=array[6];
    var hour=array[7];
    var minute=array[8];

    var now = new Date();
    var year_now=now.getFullYear();
    var month_now=now.getMonth()+1;
    var day_now=now.getDate();
    var hour_now=now.getHours();
    var minute_now=now.getMinutes()+2;
    // console.log(minute)
    // console.log(minute_now)
    // var fecha_qr=new Date(year,month,day,hour,minute)
    // var fecha_actual=new Date(year_now,month_now,day_now,hour_now,minute_now)
    // console.log(fecha_actual.getTime())
    // console.log(fecha_qr.getTime())
    if(year!=""){
        if (year < year_now) {
        alert('QR CADUCADO');
        } else if (year <= year_now && month < month_now) {
            alert('QR CADUCADO');
        } else if (year <= year_now && month <= month_now && day < day_now) {
            alert('QR CADUCADO');
        } else if (year <= year_now && month <= month_now && day <= day_now && hour < hour_now) {
            alert('QR CADUCADO');
        } else if (year <= year_now && month <= month_now && day <= day_now && hour == hour_now && minute > minute_now) {
            alert('QR CADUCADO');
        } else if (year <= year_now && month <= month_now && day <= day_now && hour == hour_now && minute < minute_now) {
            alert('QR valido');
            closeCamara();
            // Ajax
            read();
        }else{
            alert('Este QR no es valido')
            console.log(array)
            // Msg error
        }
    }

    function read() {
        // var section = document.getElementById('section-3');
        var ajax = new objetoAjax();
        var token = document.getElementById('token').getAttribute('content');
        // Busca la ruta read y que sea asyncrono
        ajax.open('POST', 'validarQRcamarero', true);
        var datasend = new FormData();
        datasend.append('_token', token);
        datasend.append('id_promo', id_promo);
        datasend.append('id_camarero', id_camarero);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var respuesta = JSON.parse(ajax.responseText);
                // var tabla = '';
                console.log(respuesta)
               // section.innerHTML = tabla;
            }
        }
        ajax.send(datasend);
    }
}