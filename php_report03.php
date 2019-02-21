<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานสินค้า</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
    <div class="container">
    <center>
        <form action="php_report03.php" method="post">
            <table class="table">
                <tr>
                    <td width='60'><label>ค้นหา</label></td>
                    <td>
                        <select name="list" class="form-control">
                            <option value="all">ทั้งหมด</option>
                            <option value="proId">รหัสสินค้า</option>
                            <option value="proName">ชื่อสินค้า</option>
                            <option value="brandName">ยี่ห้อ</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="keyword" class="form-control" size="20">
                    </td>
                    <td>
                        <button type="submit" name="report" class="btn btn-success">ออกรายงาน</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    </div>
</body>
</html>

<?php
include('connect.php');



if (isset($_POST['report'])) {
    $select = $_POST['list'];
    $keyword = $_POST['keyword'];
    $sql;

    if ($select == 'all') {
        $sql = "SELECT a.*,b.brandName FROM product a, brand b WHERE a.brandId = b.brandId";
    } else {
        $sql = "SELECT a.*,b.brandName FROM product a, brand b WHERE a.brandId = b.brandId AND $select = '$keyword'";
    }
// Create Report
    require('C:\xampp\htdocs\fpdf181\fpdf.php');
    ob_end_clean();
    ob_start();

#region Class PDF
    class PDF extends FPDF
    {
#region Header
        function Header()
        {
            global $title;
            $w = $this->GetStringWidth($title) + 8;
            $this->SetX((210 - $w) / 2); // Set Center on top page
            $this->SetLineWidth(1);
            $this->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
            $this->SetFont('THSarabunNew', 'B', 20);
            $this->Cell($w, 10, iconv('UTF-8', 'cp874', $title), 0, 0, 'C');
            $this->Ln();

        }
#endregion Heaer

#region Footer
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('THSarabunNew', 'B', 8);
            $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
#endregion Footer
    }
#endregion Class PDF

    $pdf = new PDF();
    $title = "รายงานประจำเดือน";
    $pdf->SetTitle($title);
    $pdf->AddPage();

    // Add & Set Font
    $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
    $pdf->AddFont('THSarabunNew', 'B', 'THSarabunNew_b.php');
    $pdf->SetFont('THSarabunNew', '', 16);
    $pdf->SetFont('THSarabunNew', 'B', 16);

    //set Color for Table
    $pdf->SetFillColor(180, 180, 255);
    $pdf->SetDrawColor(50, 50, 100);
    $pdf->Cell(20, 10, 'CODE', 1, 0, '', true);
    $pdf->Cell(60, 10, 'Product Name', 1, 0, '', true);
    $pdf->Cell(60, 10, 'Brand Name', 1, 0, '', true);
    $pdf->Ln();

    //Execute SQL
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $bd_proId = $row['proId'];
        $bd_proName = $row['proName'];
        $bd_brandName = $row['brandName'];

        $pdf->Cell(20, 10, iconv('UTF-8', 'cp874', $bd_proId), 1);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $bd_proName), 1);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $bd_brandName), 1);
        $pdf->Ln();
    }
    $pdf->Output();
    ob_end_flush();
}
?>