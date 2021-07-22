<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Share Disease Info</title>
    <script src="js/index-jquey.js"></script>
    <style>
        .container {
            background-color: #ffd57e;
        }
        input[type="file"]{
            display: none;
        }
        #ppic{
            border: 1px solid black;
        }
        input[type="radio"] {
            width: 15px;
            height: 15px;
        }
        .radStyle{
            font-size: 18px;
            margin-left: 10px;
        }

    </style>
    <script>
    /*$(document).ready(function(){
        $("#fetch_btn").click(function(){
            var user = $("#user").val();
            $.getJSON("profile-json.php?user="+user,function(result){
                    //alert(JSON.stringify(result));
                $("#mobile").val(result[0].mobile);
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
        
    });*/
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
                        <center>Share Disease Info</center>
                    </b></h2>
            </div>
        </div>
        <form action="share-disease-info-backend.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
               <div class="col-md-3 form-group  offset-md-2">
                   <label for="user">Username:</label>
                    <center>
                        <input type="text" name="user" id="user" class="form-control" readonly value="<?php echo $_SESSION["activeuser"];?>">
                    </center>
                </div>
                <div class="col-md-3 offset-md-1 form-group">
                   <label for="category">Category:</label>
                    <center>
                       <select name="category" id="category" class="form-control">
                           <option value="Skin">Skin</option>
                           <option value="Dental">Dental</option>
                           <option value="Ortho">Ortho</option>
                           <option value="Eyes">Eyes</option>
                           <option value="Heart">Cardiological(Heart)</option>
                           <option value="Brain">Neurological(Brain)</option>
                           <option value="Gastro">Gastro(Digestion)</option>
                           <option value="ENT">ENT(Ear-Nose-Throat)</option>
                           <option value="Flu">Flu(Cold/Viral Infection)</option>
                           <option value="Cancer">Cancer</option>
                           <option value="Other">Other(Not-Listed)</option>
                       </select>
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 form-group offset-md-2">
                   <label for="dname">Disease Name:</label>
                    <center>
                        <input type="text" name="dname" id="dname" class="form-control">
                    </center>
                </div>
                <div class="col-md-2 form-group offset-md-1 mt-1">
                   <label for="">Available for Calls?</label>
                    <center>
                       <div class="form-row">
                       <div class="col-md-6">
                           <input type="radio" name="rad" id="radYes" checked value="Yes"><label for="radYes" class="radStyle">Yes</label>
                       </div>
                       <div class="col-md-6">
                           <input type="radio" name="rad" id="radNo" value="No">
                           <label for="radNo" class="radStyle">No</label>
                       </div>
                        </div>
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 form-group offset-md-2">
                   <label for="symptoms">Symptoms/Problems:</label>
                   <textarea name="symptoms" id="symptoms" cols="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 form-group offset-md-2">
                   <label for="recommend">Recommended Doctors(with contact details):</label>
                   <textarea name="recommend" id="recommend" cols="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 form-group offset-md-2">
                   <label for="suggest">Suggestions:</label>
                   <textarea name="suggest" id="suggest" cols="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 form-group offset-md-2">
                  <label for="">Upload Pics(if any):</label>
                   <center>
                   <label for="fileup1">
                    <img src="pics/upload_img.jpg" alt="" height="150" width="150" name="ppic1" id="preview1" style="margin-right: 20px;"></label>
                    <label for="fileup2">
                    <img src="pics/upload_img.jpg" alt="" height="150" width="150" name="ppic2" id="preview2"></label>
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                  <center>
                    <input type="file" name="fileup1" id="fileup1" onchange="showpreview(this,ppic1);" class="form-control">
                    <input type="file" name="fileup2" id="fileup2" onchange="showpreview(this,ppic2);" class="form-control">
                </center>
               </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                   <center>
                    <input type="submit" name="btn" value="Share Info" class="btn btn-primary mb-5">
                    </center>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
