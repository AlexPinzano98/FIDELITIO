<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
  </head>
  <body>
    <button id="camara" onclick="openCamara()">CAMARA</button>
    <button id="camara" onclick="closeCamara()">CLOSE</button>

    <video id="preview" width="100%" height="100%" style="display: none;"></video>
    <script>
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
    let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
                //alert('Contenido: ' + content);
                sellar(content);
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
            document.getElementById('preview').style.display = "block";
        }
        function closeCamara(){
            scanner.stop();
            document.getElementById('preview').style.display = "none";
        }
        function sellar(content){
            //alert(content);
            const array = content.split(',');
            //alert(array[1]);
            var id_local=array[1];
            var year=array[2];
            var month=array[3];
            var day=array[4];
            var hour=array[5];
            var minute=array[6];

            
            var now = new Date();
            var year_now=now.getFullYear();
            var month_now=now.getMonth()+1;
            var day_now=now.getDate();
            var hour_now=now.getHours();
            var minute_now=now.getMinutes()+25;
            //alert(minute)
            var fecha_qr=new Date(year,month,day,hour,minute)
            var fecha_escaneo=new Date(year_now,month_now,day_now,hour_now,minute_now)

            if (year < year_now) {
                alert('QR CADUCADO');
            } else if (year <= year_now && month < month_now) {
                alert('QR CADUCADO');
            } else if (year <= year_now && month <= month_now && day < day_now) {
                alert('QR CADUCADO');
            } else if (year <= year_now && month <= month_now && day <= day_now && hour < hour_now) {
                alert('QR CADUCADO');
            } else if (year <= year_now && month <= month_now && day <= day_now && hour <= hour_now && minute < minute_now) {
                alert('QR CADUCADO');
            // if (fecha_qr.getTime() < fecha_escaneo.getTime()) {
            //     alert('QR CADUCADO');
            //  } else {
                alert('QR valido');
                            //alert(id_local);
            // var token = document.getElementById("token").getAttribute("content");
            // var ajax = new objetoAjax();
            // ajax.open('POST', 'ver_promociones', true);
            // var datasend = new FormData();
            // datasend.append('id_local', id_local);
            // datasend.append('_token', token);
                //alert('Contenido: ' + content);
            }

        }
    </script>

 </body>
</html>