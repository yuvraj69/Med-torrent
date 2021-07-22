<?php
include_once("mysql-connection.php");
$user=$_GET["user"];
$mname=$_GET["mname"];
$company=$_GET["company"];
$expiry=$_GET["expiry"];
$quantity=$_GET["quantity"];
$type=$_GET["type"];
$choice=$_GET["choice"];
$mrp=$_GET["mrp"];
$price=$_GET["price"];
$mode=$_GET["rad"];
$rid=$_GET["rid"];
$query="update medicines set  username='$user',medname='$mname',company='$company',expiry='$expiry',quantity='$quantity',type='$type',choseto='$choice',mrp='$mrp',offeredprice='$price',mode='$mode' where rid='$rid'";
mysqli_query($database,$query);
echo "Medicine Details updated!!";
?>