<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Type</title>
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
        $sql_runNo = "SELECT * FROM type";
        $qry_runNo = mysqli_query($conn, $sql_runNo);
        $getId = "";
        while ($res = mysqli_fetch_array($qry_runNo)) {
            $getId = $res['typeId'];
        }
        if ($getId != '') {
            $subId = substr($getId, -1);
            $newNo = $subId + 1;
            $newId = "T$newNo";
            return $newId;
        }else {
            $newId = "T1";  
            return $newId;
        }
    }
    $showId = RunNo();
    
    if (isset($_POST['submit'])) {
        $typeId = $_POST['txt_typeId'];
        $typeName = $_POST['txt_typeName'];
        $sql_insert = "INSERT INTO type (typeId,typeName) VALUE ('$typeId','$typeName')";
        mysqli_query($conn, $sql_insert);
        $showId = RunNo();        
    }
?>


<body>
    <center>
        <form action="type.php" method="POST">
            <table>
                <tr>
                    <td>รหัสหมวดหมู่</td>
                    <td>
                        <input type="text" name="txt_typeId" readonly value="<?php echo $showId;?>">
                    </td>
                </tr>
                <tr>
                    <td>ชื่อหมวดหมู่</td>
                    <td>
                        <input type="text" name="txt_typeName" maxlenght="50">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="บันทึก">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html> 