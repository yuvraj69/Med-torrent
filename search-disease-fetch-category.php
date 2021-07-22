<?php
include_once("mysql-connection.php");
//$user=$_GET["user"];
$query="select distinct category from diseases";
$records=mysqli_query($database,$query);
$ary=[];
while($row=mysqli_fetch_array($records))
	{
		$ary[]=$row;
		
	}
echo json_encode($ary);
?>