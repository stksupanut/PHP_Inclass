<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?PHP
    require('connect.php');
    $delete_id = $_GET['delete_id'];
    $SQL = "DELETE FROM product WHERE proId = '".$delete_id."'";
    $res = mysqli_query($conn,$SQL);
    echo "ลบข้อมูลเรียบร้อยแล้ว";
    mysqli_close($conn);
?>
</body>
</html>