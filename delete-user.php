<?php
include_once("mysql-connection.php");
$user=$_GET["user"];
$query="delete from users where username='$user'";
mysqli_query($database,$query);

if(mysqli_affected_rows($database)==0)
	echo "Invalid Username";
else
	echo "User Deleted Permanently";
?>