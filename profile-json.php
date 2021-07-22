<?php
include_once("mysql-connection.php");
$user=$_GET["user"];
$query="select * from profiles where username='$user'";
$record=mysqli_query($database,$query);
$arr=[];

while($row=mysqli_fetch_array($record))
{
    $arr[]=$row;
}

echo json_encode($arr);
?>