<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document_Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<?php
    $conn = mysqli_connect('localhost','root','root','is248');
    mysqli_query($conn,'set names utf8');


?>


<body>
    <center>
        <form action="document_search.php" method="POST">
            <table>
                <tr>
                    <td>ค้นหาตามหมวดหมู่</td>
                    <td>
                        <input type="text" name="kw">
                    </td>
                    <td>
                     <input type="submit" name="submit" value="ค้นหา">                        
                    </td>
                </tr>
            </table>
            <br><br>
            <?php
                if (isset($_POST['submit'])) {
                    $conn = mysqli_connect('localhost','root','root','is248');
                    mysqli_query($conn,'set names utf8');
                    $kw = $_POST['kw'];
                    $i = 1;
                    $sql_search = "SELECT document.docId,document.docName,type.typeName,document.status FROM document INNER JOIN type ON document.typeId = type.typeId 
                                    WHERE type.typeName LIKE '%$kw%' ";
                    $res = mysqli_query($conn, $sql_search);
                
            ?>
            <table border="1">
                <tr>
                    <th align="center">ลำดับ</th>
                    <th align="center">รหัสเอกสาร</th>
                    <th align="center">เอกสาร</th>
                    <th align="center">หมวดหมู่</th>
                    <th align="center">สถานะ</th>
                    <th align="center">รายละเอียด</th>
                </tr>
                <?php
                    while($Array=mysqli_fetch_array($res)){
                ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $Array['docId']?></td>
                        <td><?php echo $Array['docName']?></td>
                        <td><?php echo $Array['typeName']?></td>
                        <td>
                        <?php
                            if($Array['status'] == 1) {
                                echo "ปกติ";
                            }else if($Array['status'] == 2) {
                                echo "ยกเลิก";
                            }
                        ?></td>
                        <td><a href="show_detail.php?docId=<?php echo $Array['docId'];?>">รายละเอียด</a></td>                        
                    </tr>
                    <?php 
                    $i++;
                    } //end while
                } //end if
                ?>
            </table>
        </form>
    </center>
</body>

</html> 