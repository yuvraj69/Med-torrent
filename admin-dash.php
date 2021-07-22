<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Admin</title>
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
            width: 250px;
            height: 250px;
            margin-right: 100px;
        }

        .card:hover {
            transition: ease all 0.3s;
            box-shadow: 0px 0px 8px 3px lightgray;
        }

        .card-img-top {
            margin-top: 30px;
            width: 130px;
            height: 130px;
        }

        #bodyCont {
            background-color: #dbf6e9;
            padding: 100px 40px 226px 40px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="heading">
            <div class="col-md-12">
                <center>
                    <h1><b>Admin</b></h1>
                </center>
            </div>
        </div>
    </div>
    <div class="container" id="bodyCont">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <div class="card" style="margin-left:100px;">
                    <img src="pics/profile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <div>
                               <a href="user-manager.php">
                                <input type="button" class="btn btn-success mt-2" value="Users">
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="card">
                    <img src="pics/profile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <div>
                                <input type="button" class="btn btn-success mt-2" value="Users">
                            </div>
                        </center>
                    </div>
                </div>
                <div class="card">
                    <img src="pics/profile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <div>
                                <input type="button" class="btn btn-success mt-2" value="Users">
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
