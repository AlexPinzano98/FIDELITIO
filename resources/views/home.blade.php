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
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Contenido: ' + content);
            nepe(content);
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
            var minute_now=now.getMinutes()+5;
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
            }else{
                alert('Este QR no es valido')
            }
            }

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
    </script>

 </body>
</html>