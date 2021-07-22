<?php
include_once("mysql-connection.php");
$user=$_GET["user"];
$pass=$_GET["pass"];
$mobile=$_GET["mobile"];
$query="select * from users where username='$user' or mobile='$mobile'";
$record=mysqli_query($database,$query);
$count=mysqli_num_rows($record);
if($count == 1)
echo "0";
if($count == 0 && $pass != "p")
    {
        $query="insert into users(username, password, mobile) values ('$user','$pass','$mobile')";
        $new=mysqli_query($database,$query);
        //echo "1";
    header("location: json-login.php?user=".$user."&pass=".$pass);
    }
?>
        


