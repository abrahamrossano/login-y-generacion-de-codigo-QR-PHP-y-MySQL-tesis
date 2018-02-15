<?php
require('/fpdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Write(5,utf8_decode('A continuación mostramos una imagen '));
$pdf->Image('https://chart.googleapis.com/chart?cht=qr&amp;chs=300x300&amp;chl=holae&amp;chld=H|0' , 80 ,22, 35 , 38,'PNG', 'http://www.desarrolloweb.com');

$pdf->Output();
?>