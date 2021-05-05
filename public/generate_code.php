<?php 
if(isset($_POST) && !empty($_POST)) {
	include('library/phpqrcode/qrlib.php'); 
	$codesDir = "codes/";	
	$codeFile = date('d-m-Y-h-i-s').'.png';
	$formData = $_POST['formData'];
	// generating QR code
	//$array = array($formData,$codeFile);
	//$array=$_POST['formData'];
	// $array = [
	// 	"id_promotion" => $formData,
	// 	"bar" => $codeFile,
	// ];
	QRcode::png($formData, $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
	//QRcode::png($formData, $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
	// display generated QR code
	echo '<img class="img-thumbnail" src="./'.$codesDir.$codeFile.'" />';
} else {
	header('location:./');
}
?>