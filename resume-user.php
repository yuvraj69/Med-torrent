<?php
include_once("mysql-connection.php");
$user=$_GET["user"];
$query="update users set status=1 where username='$user'";
mysqli_query($database,$query);

if(mysqli_affected_rows($database)==0)
	echo "Invalid Username";
else
	echo "User Resumed";
?>