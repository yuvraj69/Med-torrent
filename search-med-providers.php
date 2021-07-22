<?php
include_once("mysql-connection.php");
$city=$_GET["city"];
$medname=$_GET["medname"];
$query="select * from medicines where city='$city' and medname='$medname'";
$records=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($records))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>