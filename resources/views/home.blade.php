<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
  </head>
  <body>
    <button id="camara" onclick="openCamara()">CAMARA</button>
    <video id="preview" style="width: 100%; height: 100vh; display: none;"></video>
    <script>
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
            nepe(content);
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("No existe cámara en el dispositivo!");
            }
        });
        function nepe(content){
            alert('chupamela');
        }
    </script>

 </body>
</html>