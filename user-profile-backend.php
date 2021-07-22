<?php
include_once("mysql-connection.php");
$btn=$_POST["btn"];
if($btn == "Save")
    saveDetails($database);
else if($btn == "Update")
    updateDetails($database);
function saveDetails($database)
{
    $user=$_POST["user"];
    $mobile=$_POST["mobile"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $city=$_POST["city"];
    $adhno=$_POST["adhno"];
	$dob=$_POST["dob"];
	$address=$_POST["address"];
    $zip=$_POST["zip"];
	$fileName=$_FILES["fileup"]["name"];
	$tmpName=$_FILES["fileup"]["tmp_name"];
	move_uploaded_file($tmpName,"uploads/".$fileName);
	$query="insert into profiles values('$user','$mobile','$name','$email','$gender','$city','$adhno','$dob','$address','$zip','$fileName')";
	mysqli_query($database,$query);
	$err=mysqli_error($database);
	if($err=="")
    {
        echo '<script>alert("Profile Saved Successfully"); document.location="user-dash.php"</script>';
        //header("location: user-dash.php");
    }
	else
		echo $err;
}
function updateDetails($database)
{
    $user=$_POST["user"];
    $mobile=$_POST["mobile"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $city=$_POST["city"];
    $adhno=$_POST["adhno"];
	$dob=$_POST["dob"];
	$address=$_POST["address"];
    $zip=$_POST["zip"];
	$fileName=$_FILES["fileup"]["name"];
    if($fileName=="")
        $fileName=$_POST["hdn"];
    else{
        $tmpName=$_FILES["fileup"]["tmp_name"];
	    move_uploaded_file($tmpName,"uploads/".$fileName);
        unlink("uploads/".$_POST["hdn"]);/*This will delete old photo*/
    }
	
	$query="update profiles set mobile='$mobile',name='$name',email='$email',gender='$gender',city='$city',aadhar='$adhno',dob='$dob',address='$address',zip='$zip',ppic='$fileName' where username='$user'";
	mysqli_query($database,$query);
    $count=mysqli_affected_rows($database);
    if($count==0)
		echo "Invalid username";
	else
		echo "<script>alert('Profie Updated');</script>";
}
?>