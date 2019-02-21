
<?php


include ('connect.php');
$update_id = $_GET['update_id'];

if($_GET['update_id'] !=""){
    $update_id = $_GET['update_id'];
    $sql ="SELECT a.proId, a.proName, b.brandName 
    FROM product a, brand b
    WHERE a.brandId = b.brandId 
    AND proId = '".$update_id."'";

    $result = mysqli_query($conn,$sql);
    while($array = mysqli_fetch_array($result)){
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form method="post" action="#">
    <table width="400" border="0">
        <tr>
                <td width="100">รหัส </td>
                <td width="250"><input type="text" name="proId" size="40" value="<?php echo $array['proId']?>"></td>
        </tr>
        <tr>
                <td width="100">ชื่อสินค้า </td>
                <td width="250"><input type="text" name="proName" size="40" value="<?php echo $array['proName']?>"></td>
        </tr>
         <tr>
                <td width="100">ยี่ห้อ </td>
                <td width="250">
                <select name="brandId">
			<option value="">ยื่ห้อ </option>
			<?php
			$sql2 = "SELECT * FROM brand ORDER BY brandName ASC";
			$result = mysqli_query($conn,$sql2);
            while($row = mysqli_fetch_array($result))
			{
			?>
			<option value="<?php echo $row["brandId"];?>"><?php echo $row["brandName"];?></option>
			<?php
			}
			?>
		  </select>
          </td>
                
                
                
                
                </td>
        </tr>
        <tr>
            <td><button type="submit" name="update">ตกลงจ้าาา</button></td>
              <td>  <button type="reset" name="save">ยกเลิกจ้าาา</button>
        
        </td>
        </tr>


    </table>




</body>
</html>
<?php
    }
}

if(isset($_POST['update'])){
    $SQL="UPDATE product SET proName = '".$_POST["proName"]."', brandId='".$_POST["brandId"]."' WHERE proId = '".$_POST["proId"]."'";
    $result = mysqli_query($conn,$SQL);
    
    echo "ปรับปรุงข้อมูล Id $update_id เรียบร้อยจ้าาา";
}
mysqli_close($conn);



?>


