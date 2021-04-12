<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/camarero.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/camarero.css')}}">
    <title>Camarero</title>
</head>
<body>
<div id="promociones"></div>
<?php 
if(isset($_POST) && !empty($_POST)) {
    //{{'css/app.css')}}
	include(asset('library/phpqrcode/qrlib.php')); 
	$codesDir = "public/codes/";
    //$codesDir = asset('public/codes/');
	$codeFile = date('d-m-Y-h-i-s').'.png';
	$formData = $_POST['formData'];
	// generating QR code
	QRcode::png($formData, $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
	// display generated QR code
	echo '<img src="./'.$codesDir.$codeFile.'" />';
} else {
	header('location:./');
}
?>


<input class="form-control col-xs-1" id="content" type="hidden">
<input class="form-control col-xs-1" id="ecc" type="hidden" value="M">
<input class="form-control col-xs-1" id="size" type="hidden" value="5">
<div id="modal" class="modal">
<div class="modal-content">
<div class="showQRCode"></div>
</div>
</div>


</body>
</html>