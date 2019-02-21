
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ค้นหาข้อมูล</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <form method="post" action="php19_search.php">
    <table>
        <tr>
            <td width="60">ค้นหา</td>
            <td>
                <select name="list">
                    <option value="all">ทั้งหมด</option>
                    <option value="proId">รหัสสินค้า</option>
                    <option value="proName">ชื่อสินค้า</option>
                    <option value="brandName">ยี่ห้อ</option>                  
                </select>
            </td>
            <td width="60"><input type="text" name="keyword" placeholder="keyword" size="20"></td>
            <td><button type="submit" name="submit">ค้นหา</button></td>
        </tr>
    </table>
    </form>
    </body>
</html>

<?php
    require_once('connect.php'); 
    //เรียกไฟล์ connect DB มาในไฟล์นี้ เพื่อใช้ connect ฐานข้อมูล
    // หรือ require('connect.php');

    if(isset($_POST['submit'])){ //เมื่อกดปุ่ม submit
        $select =$_POST['list'];
        if($select =='all'){ //ถ้าเลือก ทั้งหมด
           // SQL นี้จะแสดงแต่รหัส brand แต่เราต้องการแสดงชื่อ ดังนั้นต้องทำการ join ตาราง 2 ตาราง
           //$SQL ="SELECT * FROM product";
           //inner-join 2 ตาราง
           $SQL ="SELECT a.*, b.brandName FROM product a,brand b WHERE a.brandId = b.brandId";//  

           //$SQL ="SELECT product.* brand.brandName FROM product ,brand
           //WHERE product.brandId = brand.brandId"; 
            }
        else{ //ถ้าเลือกรายการอื่น
            //$SQL ="SELECT * FROM product WHERE $select= '".$_POST['keyword']."' ";            
            $SQL ="SELECT a.*, b.brandName FROM product a,brand b WHERE a.brandId = b.brandId and $select= '".$_POST['keyword']."' ";// inner-join 
        }
        $result = mysqli_query($conn,$SQL);
        /* 
        while($array=mysqli_fetch_assoc($result)){
            echo $array['proId']."    ";
            echo $array['proname']."     ";
            echo $array['brandId']."     ";
            echo "<br>";            
        }
        */
?>
<!-- แสดงในรูปแบบของตาราง-->
        <table width="500" border="1">
            <tr>
                <th width="70" align="center">รหัสสินค้า</th>
                <th width="70" align="center">ชื่อสินค้า</th>
                <th width="70" align="center">ยี่ห้อ</th>                    
            </tr>
            <?php
            while($Array=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td align="center"><?php echo $Array['proId']?></td>
                <td align="center"><?=$Array['proName']?></td>
                <td align="center"><?=$Array['brandName']?></td>
                <td >
                <div  align="center">
                <a href="php20_update.php?update_id=<?php echo $Array['proId'];?>">แก้ไข</a>
              </div>
              </td>
              <td >
                <div  align="center">
                <a href="php21_delete.php?delete_id=<?php echo $Array['proId'];?>">ลบ</a>
              </div>
              </td>
            </tr>
            <?php 
            } //end while
            ?>
        </table>
<?php
    } //end if(isset($_POST['submit']
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล
?>
