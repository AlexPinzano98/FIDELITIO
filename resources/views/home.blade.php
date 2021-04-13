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
        
        function nepe(content){
            //alert('chupamela');
        }

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
    </script>

 </body>
</html>