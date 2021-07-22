<?php
include_once("mysql-connection.php");
$rid=$_GET["rid"];
$query="delete from medicines where rid='$rid'";
mysqli_query($database,$query);

if(mysqli_affected_rows($database)==0)
	echo "Invalid Rid";
else
	echo "Medicine Deleted";
?>