<?php
include_once("mysql-connection.php");
$user=$_POST["user"];
$category=$_POST["category"];
$dname=$_POST["dname"];
$contact=$_POST["rad"];
$symptoms=$_POST["symptoms"];
$recommend=$_POST["recommend"];
$suggest=$_POST["suggest"];
$fileName1=$_FILES["fileup1"]["name"];
  $tmpName1=$_FILES["fileup1"]["tmp_name"];
  move_uploaded_file($tmpName1,"uploads/".$fileName1);
$fileName2=$_FILES["fileup2"]["name"];
  $tmpName2=$_FILES["fileup2"]["tmp_name"];
  move_uploaded_file($tmpName2,"uploads/".$fileName2);
$query="insert into diseases values('$user','$category','$dname','$contact','$symptoms','$recommend','$suggest',current_date(),'$fileName1','$fileName2')";
mysqli_query($database,$query);
$err=mysqli_error($database);
if($err=="")
		echo "<script>alert('Info Shared Successfully'); document.location='user-dash.php';</script>";
else
		echo $err;
?>