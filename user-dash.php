<?php session_start();

if(!isset($_SESSION["activeuser"]))
    header("location:index.php");
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
    <title>MedTorrent</title>
    <script src="js/index-jquey.js"></script>
    <style>
        .container {
            max-width: 100%;

        }

        #heading {
            color: #f6f5f1;
            background-color: #16a596;
        }

        .card {
            align-items: center;
            width: 270px;
            height: 250px;
        }

        .card:hover {
            transition: ease all 0.3s;
            box-shadow: 0px 0px 8px 3px lightgray;
        }

        .card-img-top {
            width: 130px;
            height: 130px;
            /*border: 1px solid black;*/
        }

        .card-title {
            font-size: 20px;
        }

        .bgc-pink {
            background-color: #ffdada;
        }

        .bgc-blue {
            background-color: #dbf6e9;
        }

        a {
            text-decoration: none;
            color: #f6f5f1;
            font-size: 30px;
        }

        a:hover {
            color: #f6f5f1;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="heading">
            <div class="col-md-4 offset-md-4">
                <center>
                    <h1><b>Dashboard</b></h1>
                </center>
            </div>
            <div class="col-md-3 offset-md-1" style="margin-top: 12px;">
                <div class="row">
                    <div class="col-md-7 offset-md-3 pr-0">
                        <span style="font-size:20px;">Hello, <?php echo $_SESSION["activeuser"];?></span>
                    </div>
                    <div class="col-md-1 pl-0">
                        <a href="#" class="fa fa-sign-out fa-2x" data-toggle="modal" data-target="#logoutModal"></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-4 pb-4" style="background-color: #dbf6e9">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="user-profile-front.php" class="btn card d-flex justify-content-center ">
                    <img src="pics/profile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Profile</h5>
                        </center>
                        <p class="card-text">Create/Update your Profile</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="medicine-details.php" class="btn card d-flex justify-content-center">
                    <img src="pics/drug.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Unused Medicine</h5>
                        </center>
                        <p class="card-text">Sell/Donate unused medicine</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="med-manager-front.php" class="btn card d-flex justify-content-center">
                    <img src="pics/med-manager.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Medicine Manager</h5>
                        </center>
                        <p class="card-text">Update/Delete your medicines</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="search-med-front.php" class="btn card d-flex justify-content-center">
                    <img src="pics/buy-med.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Buy Medicines</h5>
                        </center>
                        <p class="card-text">Buy unused medicines from people nearby</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="share-disease-info.php" class="btn card d-flex justify-content-center">
                    <img src="pics/post-disease.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Share Disease Info</h5>
                        </center>
                        <p class="card-text">Upload new experience of a disease</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4">
                <a href="search-disease-front.php" class="btn card d-flex justify-content-center">
                    <img src="pics/find-disease.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Find Disease Info</h5>
                        </center>
                        <p class="card-text">Find details/experiences about a disease</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="logoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Logout?</p>
                </div>
                <div class="modal-footer">
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
