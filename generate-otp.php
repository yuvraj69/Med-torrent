<?php
include_once("mysql-connection.php");
include_once("SMS_OK_sms.php");
$mob=$_GET["regMob"];
$query="select * from users where mobile='$mob'";
$record=mysqli_query($database,$query);
$count=mysqli_num_rows($record);
if($count == 0)
echo "0";
else
{
    $generator = "1357902468"; 
    $result = ""; 
    for ($i = 1; $i <= 6; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    SendSMS("$mob","OTP for verification is: ".$result);
    echo "$result";
}
?>