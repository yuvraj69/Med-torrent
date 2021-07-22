<?php
session_start();//it creates session array for the user logged in now
include_once("mysql-connection.php");
$user=$_GET["user"];
$pass=$_GET["pass"];
$query="select * from users where username='$user' and password='$pass'";
$record=mysqli_query($database,$query);
$count=mysqli_num_rows($record);
if($count == 0)
echo "0";
else
{
    $_SESSION["activeuser"]=$user;
    while($ary = $record -> fetch_array())
    {
        $_SESSION["usermobile"] = $ary[2];
    }
    
    //$_SESSION["usermobile"];
    //$_SESSION["usermobile"]=$record[0].mobile;
    echo "1";
}
        ?>
        