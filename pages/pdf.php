<?php
    require('../fpdf/fpdf.php');
    $correo = 'cristian@wred.com.mx';
    
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Write(5,utf8_decode('A continuación mostramos una imagen '));
    $pdf->Image('QR.png' , 80 ,22, 35 , 38,'PNG', 'http://www.desarrolloweb.com');
    $pdf->Output();
?>