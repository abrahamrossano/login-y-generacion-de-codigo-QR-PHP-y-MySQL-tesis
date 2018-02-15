<?php
    require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        $correo = md5($usuario);

         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "base_datos";

         include("phpqrcode-master/qrlib.php");

         $conn = new mysqli($servername, $username, $password, $dbname);
        
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT * FROM usuario where correo='$usuario'";
         $result = $conn->query($sql);

         echo "<form><table border='1'>"; 


         if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {

       $PNG_TEMP_DIR = "qrcodes";

      $PNG_WEB_DIR = 'temp/';

       if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);

    $filename = $PNG_TEMP_DIR.$row["correo"].'.png';

    $errorCorrectionLevel = 'L';
    $matrixPointSize = 4;

    $filename = $PNG_TEMP_DIR.$row["correo"].'.png';

    echo $filename;

    QRcode::png(md5($row["correo"]), $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
             
    require_once "mpdf/mpdf.php";

        $cabecera = "<span><b>Informe PDF</b></span>";
        $pie = "<span>Descripción pie</span>";
        $mpdf=new mPDF();
        $mpdf->SetHTMLHeader($cabecera);
        $mpdf->SetHTMLFooter($pie);  
        $mpdf->WriteHTML("<img src='$filename'>",2);
        $mpdf->Output('archivo.pdf','I');
        exit;
     }
    } 
   $conn->close();
    }
?>
