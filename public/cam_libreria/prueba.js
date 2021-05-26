window.onload = function() {
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
        
function onScanSuccess(qrCodeMessage) {
    alert(`QR matched = ${qrCodeMessage}`);
    // html5QrcodeScanner.clear();
    // ^ this will stop the scanner (video feed) and clear the scan area.
}

html5QrcodeScanner.render(onScanSuccess);
}  
