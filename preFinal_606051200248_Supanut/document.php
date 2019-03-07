<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<?php
    $conn = mysqli_connect('localhost','root','root','is248');
    mysqli_query($conn,'set names utf8');

    function RunNo() {
        $conn = mysqli_connect('localhost','root','root','is248');
        mysqli_query($conn,'set names utf8');
        $sql_runNo = "SELECT * FROM document";
        $qry_runNo = mysqli_query($conn, $sql_runNo);
        $getId = "";
        while ($res = mysqli_fetch_array($qry_runNo)) {
            $getId = $res['docId'];
        }
        if ($getId != '') {
            $subId = substr($getId, -1);
            $newNo = $subId + 1;
            $newId = "D$newNo";
            return $newId;
        }else {
            $newId = "D1";  
            return $newId;
        }
    }
    $showId = RunNo();
    
    if (isset($_POST['submit'])) {
        $docId = $_POST['txt_docId'];
        $docName = $_POST['txt_docName'];
        $typeId = $_POST['type'];
        $ref = $_POST['txt_ref'];
        $detail = $_POST['txt_detail'];
        $placeId = $_POST['place'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        if(!empty($_FILES["pic"]["name"])){
            $old_filename = $_FILES["pic"]["tmp_name"];
            $new_filename="IS_".$_FILES["pic"]["name"];
            //ตั้งชื่อใหม่
            copy($_FILES["pic"]["tmp_name"],"upload/".$new_filename);
        }
            $sql_insert = "INSERT INTO document (docId,docName,typeId,ref,detail,placeId,picture,date,status)
                                          VALUE ('$docId','$docName','$typeId','$ref','$detail','$placeId','$new_filename','$date','$status')";
            mysqli_query($conn, $sql_insert);

        $showId = RunNo();        
    }
?>


<body>
    <center>
        <form action="document.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>รหัสเอกสาร</td>
                    <td>
                        <input type="text" name="txt_docId" readonly value="<?php echo $showId;?>">
                    </td>
                </tr>
                <tr>
                    <td>ชื่อเอกสาร</td>
                    <td>
                        <input type="text" name="txt_docName" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td>หมวดหมู่</td>
                    <td>
                        <select name="type">
                                <?php
                                    $sql =  "SELECT * FROM type";
                                    $result = mysqli_query($conn,$sql);
                                    while($array = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $array['typeId'];?>"><?php echo $array['typeName'];?></option>
                                    <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>แหล่งอ้างอิง</td>
                    <td>
                        <input type="text" name="txt_ref" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td>รายละเอียด</td>
                    <td>
                        <textarea name="txt_detail" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>สถานที่จัดเก็บ</td>
                    <td>
                        <select name="place">
                                <?php
                                    $sql =  "SELECT * FROM place";
                                    $result = mysqli_query($conn,$sql);
                                    while($array = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $array['placeId'];?>"><?php echo 'ตู้ที่ '.$array['shelfNo'].' ชั้นที่ '.$array['levelNo'];?></option>
                                    <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>รูปภาพ</td>
                    <td>
                        <input type="file" name="pic" value="เลือกไฟล์">
                    </td>
                </tr>
                <tr>
                    <td>วันที่เอกสาร</td>
                    <td>
                        <input type="date" name="date">
                    </td>
                </tr>
                <tr>
                    <td>สถานะ</td>
                    <td>
                        <input type="radio" name="status" value="1">ปกติ
                        <input type="radio" name="status" value="2">ยกเลิก
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="บันทึก">
                        <a href="document_search.php"><input type="button" name="submit" value="ค้นหา"></a>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html> 