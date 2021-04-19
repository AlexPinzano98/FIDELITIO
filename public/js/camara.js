let scanner = new Instascan.Scanner(
    {
        video: document.getElementById('preview')
    }
);
scanner.addListener('scan', function(content) {
    alert('Contenido: ' + content);
    // sellar(content);
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