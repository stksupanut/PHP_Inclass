<?php
    $conn = mysqli_connect('localhost','root','root','is248');
    mysqli_query($conn,'set names utf8');

    if($_GET['docId'] != ""){
        $docId = $_GET['docId'];
        $sql ="SELECT a.docId,a.docName,b.typeName,a.ref,c.shelfNo,c.levelNo,a.picture,a.date,a.status,a.detail
                FROM document a,type b,place c
                ON a.typeId = b.typeId AND a.placeId = c.placeId
                WHERE a.docId = $docId";
    
        $result = mysqli_query($conn,$sql);
        while($array = mysqli_fetch_array($result)){
        }
    }
?>
