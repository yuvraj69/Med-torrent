<?php
include_once("mysql-connection.php");
$user=$_POST["user"];
$mname=$_POST["mname"];
$company=$_POST["company"];
$expiry=$_POST["expiry"];
$quantity=$_POST["quantity"];
$type=$_POST["type"];
$choice=$_POST["choice"];
$mrp=$_POST["mrp"];
$price=$_POST["price"];
$mode=$_POST["rad"];
$query="insert into medicines values(default,'$user','$mname','$company','$expiry','$quantity','$type',(select city from profiles where username='$user'),'$choice','$mrp','$price','$mode')";
mysqli_query($database,$query);
echo "<script>alert('Posted Successfully'); document.location='user-dash.php';</script>";
?>