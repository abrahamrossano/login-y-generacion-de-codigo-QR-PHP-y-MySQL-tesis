<?php
    $correo = 'cristian@wred.com.mx';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Generador de códigos QR</title>
<meta name ="author" content ="Norfi Carrodeguas">
<script type="text/javascript" src="js/qrcode.js"></script>
</head>
<body onload="update_qrcode()">
<div data-role="content">
<form>
<textarea name="msg" rows="10" cols="40" hidden="true"><?php echo $correo; ?></textarea><br> 
</form>
<div id="qr"></div>
</div>
<iframe src="gqr.php" width="300" height="300"></iframe>
</body>
</html>
