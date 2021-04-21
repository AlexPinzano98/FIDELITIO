let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});
scanner.addListener('scan', function(content) {
    alert('Contenido: ' + content);
    // sellar(content); 
});

/*
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
*/

function openCamara() {
    Instascan.Camera.getCameras().then(function(cameras) {
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
    }).catch(function(e) {
        console.error(e);
    });
    document.getElementById('preview').style.display = "block";
}

function closeCamara() {
    scanner.stop();
    document.getElementById('preview').style.display = "none";
}
