<?php
include_once("mysql-connection.php");
$mob=$_GET["mob"];
$query="select * from users where mobile='$mob'";
$record=mysqli_query($database,$query);
$arr=[];

while($row=mysqli_fetch_array($record))
{
    $arr[]=$row;
}

echo json_encode($arr);
?>