<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Place</title>
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
        $sql_runNo = "SELECT * FROM place";
        $qry_runNo = mysqli_query($conn, $sql_runNo);
        $getId = "";
        while ($res = mysqli_fetch_array($qry_runNo)) {
            $getId = $res['placeId'];
        }
        if ($getId != '') {
            $subId = substr($getId, -1);
            $newNo = $subId + 1;
            $newId = "P$newNo";
            return $newId;
        }else {
            $newId = "P1";  
            return $newId;
        }
    }
    $showId = RunNo();
    
    if (isset($_POST['submit'])) {
        $placeId = $_POST['txt_placeId'];
        $shelfNo = $_POST['txt_shelfNo'];
        $levelNo = $_POST['txt_levelNo'];
        $sql_insert = "INSERT INTO place (placeId,shelfNo,levelNo) VALUE ('$placeId','$shelfNo','$levelNo')";
        mysqli_query($conn, $sql_insert);
        $showId = RunNo();        
    }
?>


<body>
    <center>
        <form action="place.php" method="POST">
            <table>
                <tr>
                    <td>รหัสสถานที่</td>
                    <td>
                        <input type="text" name="txt_placeId" readonly value="<?php echo $showId;?>">
                    </td>
                </tr>
                <tr>
                    <td>ตู้ที่</td>
                    <td>
                        <input type="text" name="txt_shelfNo" maxlength="5">
                    </td>
                </tr>
                <tr>
                    <td>ชั้นที่</td>
                    <td>
                        <input type="text" name="txt_levelNo" maxlength="5">
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