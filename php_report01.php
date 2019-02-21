<?php
require('C:\xampp\htdocs\fpdf181\fpdf.php');
$pdf = new FPDF();

// Add Thai Font
$pdf->AddPage(); // New Paper
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->SetFont('THSarabunNew','',16);


$pdf->Cell(40,10,iconv('UTF-8','cp874','สวัสดี fpdf'));
$pdf->Output();

?>