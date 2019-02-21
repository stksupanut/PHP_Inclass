<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "is14";

    $conn = mysqli_connect($host,$username,$password,$dbname);
    mysqli_query($conn,'set names utf8');
?>