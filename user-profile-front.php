<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Profile</title>
    <script src="js/index-jquey.js"></script>
    <style>
        .container {
            background-color: #f6f5f5;
        }
        input[type="file"]{
            display: none;
        }
        #ppic{
            border-radius: 50%;
            border: 1px solid black;
        }

    </style>
    <script>
    $(document).ready(function(){
        $("#fetch_btn").click(function(){
            var user = $("#user").val();
            $.getJSON("profile-json.php?user="+user,function(result){
                    //alert(JSON.stringify(result));
                $("#name").val(result[0].name);
                $("#email").val(result[0].email);
                $("#gender").val(result[0].gender);        
                $("#city").val(result[0].city);
                $("#adhno").val(result[0].aadhar);
                $("#dob").val(result[0].dob);                                  
                $("#address").val(result[0].address);                                  
                $("#zip").val(result[0].zip);                              
                $("#hdn").val(result[0].ppic);                              
                $("#preview").prop("src","uploads/"+result[0].ppic);
            });
        });
        
    });
    </script>
    <script>
		function showpreview(file, imgid) {
			if (file.files && file.files[0]) {
				
				var reader = new FileReader();
				reader.onload = function(e) {
					$(imgid).prop('src', e.target.result);
				}
				reader.readAsDataURL(file.files[0]);
			}
		}
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <h2><b>
                        <center>Your Profile</center>
                    </b></h2>
            </div>
        </div>
        <form action="user-profile-backend.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="hdn" id="hdn"> <!--Invisible text box-->
            <div class="form-row">
               <div class="col-md-3 form-group  offset-md-2">
                   <label for="user">Username:</label>
                    <center>
                        <input type="text" name="user" readonly 
                        value='<?php echo $_SESSION["activeuser"];?>' id="user" class="form-control">
                    </center>
                </div>
                <div class="col-md-1 form-group">
                    <center>
                        <input type="button" value="Fetch" class="btn btn-outline-info form-control" style="margin-top: 31.5px;" name="fetch_btn" id="fetch_btn">
                    </center>
                </div>
                <div class="col-md-3 offset-md-1 form-group">
                   <label for="mobile">Mobile:</label>
                    <center>
                        <input type="text" name="mobile" id="mobile" class="form-control" readonly value='<?php echo $_SESSION["usermobile"];?>'>
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 form-group offset-md-1">
                   <label for="name">Name:</label>
                    <center>
                        <input type="text" name="name" id="name" class="form-control">
                    </center>
                </div>
                <div class="col-md-3 form-group offset-md-1">
                   <label for="email">Email:</label>
                    <center>
                        <input type="text" name="email" id="email" class="form-control">
                    </center>
                </div>
                <div class="col-md-2 form-group offset-md-1">
                   <label for="gender">Gender:</label>
                    <center>
                        <select class="form-control" id="gender" name="gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 form-group offset-md-1">
                   <label for="city">City:</label>
                    <center>
                        <input type="text" name="city" id="city" class="form-control">
                    </center>
                </div>
                <div class="col-md-3 form-group offset-md-1">
                   <label for="adhno">Aadhar No:</label>
                    <center>
                        <input type="text" name="adhno" id="adhno" class="form-control">
                    </center>
                </div>
                <div class="col-md-2 form-group offset-md-1">
                   <label for="dob">Date of Birth:</label>
                    <center>
                        <input type="date" name="dob" id="dob" class="form-control">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-7 offset-md-1 form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="col-md-2 form-group offset-md-1">
                   <label for="zip">Zip:</label>
                    <center>
                        <input type="text" name="zip" id="zip" class="form-control">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                   <center>
                    <img src="pics/blank-profile-pic.png" alt="" height="140" width="150" name="ppic" id="preview" style="border-radius:50%">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                  <center>
                   <label for="fileup" class="btn btn-danger">Upload
                    <input type="file" name="fileup" id="fileup" onchange="showpreview(this,ppic);" class="form-control">
                </label>
                </center>
               </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                   <center>
                    <input type="submit" name="btn" id="btnSave" value="Save" class="btn btn-primary mb-4 mr-5">
                    <input type="submit" name="btn" id="btnUpdate" value="Update" class="btn btn-success mb-4 ml-5">
                    </center>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
