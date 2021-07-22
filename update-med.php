<?php
include_once("mysql-connection.php");
$rid=$_GET["rid"];
$query="select * from medicines where rid='$rid'";
$record=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($record))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>