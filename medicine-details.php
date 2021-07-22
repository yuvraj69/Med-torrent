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
    <title>Medicine Details</title>
    <script src="js/index-jquey.js"></script>
    <style>
        .container {
            background-color: #b8de6f;
        }

        input[type="file"] {
            display: none;
        }

        #ppic {
            border-radius: 50%;
            border: 1px solid black;
        }

        input[type="radio"] {
            width: 15px;
            height: 15px;
        }
        .radStyle{
            font-size: 18px;
            margin-left: 5px;
        }
        #hid{
         display: none;
        }

    </style>
    <script>
        $(document).ready(function() {
            $("#fetch_btn").click(function() {
                var user = $("#user").val();
                $.getJSON("profile-json.php?user=" + user, function(result) {
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
                    $("#preview").prop("src", "uploads/" + result[0].ppic);
                });
            });

        });
    </script>
    <script>
    function payment(type)
        {
          if(type=="Sell")
              document.getElementById("hid").style="display:block;";
          else
              document.getElementById("hid").style="display:none;";
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <h2><b>
                        <center>Post Medicine</center>
                    </b></h2>
            </div>
        </div>
        <form action="medicine-details-backend.php" method="post" enctype="multipart/form-data">
           <!--<input type="hidden" name="city" value="<?php echo $_SESSION["usercity"]; ?>">-->
            <div class="form-row">
                <div class="col-md-3 form-group  offset-md-1">
                    <label for="user">Username:</label>
                    <center>
                        <input type="text" name="user" id="user" class="form-control" readonly value="<?php echo $_SESSION["activeuser"]; ?>">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 form-group offset-md-1">
                    <label for="mname">Medicine Name:</label>
                    <center>
                        <input type="text" name="mname" id="mname" class="form-control">
                    </center>
                </div>
                <div class="col-md-4 form-group offset-md-1">
                    <label for="company">Company:</label>
                    <center>
                        <input type="text" name="company" id="company" class="form-control">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 form-group offset-md-1">
                    <label for="expiry">Expiry Date:</label>
                    <center>
                        <input type="date" name="expiry" id="expiry" class="form-control">
                    </center>
                </div>
                <div class="col-md-1 form-group offset-md-1">
                    <label for="quantity">Quantity:</label>
                    <center>
                        <input type="number" name="quantity" id="quantity" class="form-control">
                    </center>
                </div>
                <div class="col-md-2 form-group">
                    <label for="type">Type:</label>
                    <center>
                        <select name="type" id="type" class="form-control">
                            <option value="Tablet">Tablet</option>
                            <option value="Strips">Strips</option>
                        </select>
                    </center>
                </div>
                <div class="col-md-2 form-group offset-md-1">
                    <label for="choice">Want To:</label>
                    <center>
                        <select name="choice" id="choice" class="form-control" onchange="payment(this.value);">
                            <option value="Donate">Donate</option>
                            <option value="Sell">Sell</option>
                        </select>
                    </center>
                </div>
            </div>
            <div id="hid">
            <div class="form-row">
                <div class="col-md-4 form-group offset-md-1">
                    <label for="mrp">Price(MRP):</label>
                    <center>
                        <input type="text" name="mrp" id="mrp" class="form-control" value="0.0">
                    </center>
                </div>
                <div class="col-md-4 form-group offset-md-1">
                    <label for="price">Offered Price:</label>
                    <center>
                        <input type="text" name="price" id="price" class="form-control" value="0.0">
                    </center>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 offset-md-1 form-group">
                    <label for="">Mode of Payment:</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 offset-md-1 form-group">
                    <input type="radio" name="rad" id="radCash" value="Cash"><label class="radStyle" for="radCash">Cash</label>
                </div>
                <div class="col-md-2 offset-md-1 form-group">
                    <input type="radio" name="rad" id="radNB" value="NetBanking"><label class="radStyle" for="radNB">Net Banking</label>
                </div>
                <div class="col-md-2 offset-md-1 form-group">
                    <input type="radio" name="rad" id="radPaytm" value="Paytm"><label class="radStyle" for="radPaytm">Paytm</label>
                </div>
                <div class="col-md-2 offset-md-1 form-group">
                    <input type="radio" name="rad" id="radAny" value="Any"  checked><label class="radStyle" for="radAny">Any</label>
                </div>
            </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mt-2 mb-3">
                    <center>
                        <input type="submit" name="btn" value="Post Advertisement" class="btn btn-primary">
                    </center>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
