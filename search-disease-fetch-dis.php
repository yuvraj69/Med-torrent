<?php
include_once("mysql-connection.php");
$category=$_GET["category"];
$query="select distinct disease from diseases where category='$category'";
$records=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($records))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>