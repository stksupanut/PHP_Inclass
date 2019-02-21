<!-- ออกรายงานมากกว่า 1 หน้า -->
<?php
require('C:\xampp\htdocs\fpdf181\fpdf.php');
ob_end_clean();
ob_start();

class PDF extends FPDF
{
    #region header
    function Header()
    {
        $this->Image('C:\xampp\htdocs\IS14\img\0.jpg', 15, 7, 30);
        $this->AddFont('THSarabunNew', '', 'THSarabunNew.php');
        $this->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
        $this->SetFont('THSarabunNew', 'B', 26);

        // ให้อยู่ด้านขวา
        $this->Cell(80);

        // หัวตาราง
        $this->Cell(90,10,iconv('UTF-8','cp874','รายงานสรุป..'),1,0,'C');

        //line break
        $this->Ln(20);
    }
    #endregion

    #region Footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('THSarabunNew','B',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    #endregion
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for ($i=0; $i <= 40; $i++) { 
    $pdf->Cell(0,10,'Print Line Number'.$i,0,1);
}$pdf->Output();

?>