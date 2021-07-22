<?php
include_once("mysql-connection.php");
$category=$_GET["category"];
$disease=$_GET["disease"];
$query="select * from diseases where category='$category' and disease='$disease'";
$records=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($records))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>