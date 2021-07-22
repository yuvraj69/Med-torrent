<?php
include_once("mysql-connection.php");
$city=$_GET["city"];
$query="select distinct medname from medicines where city='$city'";
$records=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($records))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>