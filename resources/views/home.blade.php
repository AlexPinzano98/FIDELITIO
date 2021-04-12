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
        function openCamara(){
            document.getElementById('preview').style.display = "block"
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
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("No existe cámara en el dispositivo!");
            }
        });
        function sellar(content){
            //alert(content);
            const array = content.split(',');
            //alert(array[1]);
            var id_local=array[1];
            var fecha=array[2];
            // var token = document.getElementById("token").getAttribute("content");
            // var ajax = new objetoAjax();
            // ajax.open('POST', 'ver_promociones', true);
            // var datasend = new FormData();
            // datasend.append('id_local', id_local);
            // datasend.append('_token', token);
                //alert('Contenido: ' + content);
                nepe(content);
            });
        
        function nepe(content){
            alert('chupamela');
        }
        function openCamara(){
            console.log(Instascan)
            
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
    </script>

 </body>
</html>