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
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index-jquey.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-expand-xl navbar-light bg-#f1f6f9" style="width:1400px;">
                <div class="col-md-4">
                    <a class="navbar-brand pt-0 ml-2" href="#"><span id="Heading"><b>MedTorrent</b></span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-4 offset-md-4 mt-2">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <li>
                                <button type="button" class="btn btn-primary mr-3 mb-2" data-toggle="modal" data-target="#signup_modal">SignUp</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-success mr-3 mb-2" data-toggle="modal" data-target="#login_modal">Login</button>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-dark mr-3 mb-2" href="#devBy">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-dark" href="#reachUs">Reach Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="modal" tabindex="-1" id="signup_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <span id="errUser" style="color:red;">*</span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="[8-30] characters allowed">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <span id="errPass" style="color:red;">*</span>
                                <div class="child">
                                    <input type="password" class="form-control" id="password" name="password" style="flex: 1;" placeholder="Min 8 alpha-numeric">
                                    <i class="fa fa-eye" aria-hidden="true" id="eye-sign"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <span id="errMob" style="color:red;">*</span>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="10 Digits allowed">
                            </div>
                            <div class="form-group">
                                <span id="signup-status"></span>
                                <center>
                                    <button type="button" class="btn btn-primary mt-2" id="bttn">SignUp</button>
                                </center>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="login_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pr-0">
                        <form>
                            <div class="form-group">
                                <label for="user_login">Username:</label><br>
                                <input type="text" class="form-control" id="user_login" name="user_login">
                                
                            </div>
                            <div class="form-group mb-0">
                                <label for="pass_login">Password:</label>
                                <div class="child">
                                    <input type="password" class="form-control" id="pass_login" name="pass_login" style="flex: 1;">
                                    <i class="fa fa-eye" aria-hidden="true" id="eye-sign"></i>
                                </div>
                                <a href="" data-dismiss="modal" data-toggle="modal" data-target="#forgotUser">Forgot Username/Password?</a>
                            </div>
                            <div class="form-group mb-0">
                                <span id="login-status"></span>
                                <center>
                                    <button type="button" class="btn btn-success mt-4" id="bttn_login">Login</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 px-0">
                <!--px means pl + lr-->
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="pics/sell-med-cr.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Sell/Donate Medicines</h5>
                                <p>Sell your unused medicines | Donate them for a good cause</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="pics/buy-med-cr.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Buy Medicines</h5>
                                <p>Medicines available at cheap rates | Free meds for the needy</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="pics/disease-info-cr.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Details on Diseases</h5>
                                <p>Post your experiences of a disease | Know about a disease from experiences of people</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-success mb-2">
            <div class="col-md-12">
                <center>
                    <span style="font-size:30px;color: white;">Our Services</span>
                </center>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/med-card.png" class="card-img-top" alt="..." style="background-color: #f05454">
                        <div class="card-body">
                            <h5 class="card-title">Unused Medicines</h5>
                            <p class="card-text">We all have unused medicines at home which may prove useful for someone in need. So you can easily sell/donate/buy the unused medicines.</p>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-3">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/disease-card.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Upload Disease Info</h5>
                            <p class="card-text">Want to share your experience regarding a disease? A small advice of yours may prove beneficial for someone suffering from it.</p>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-4 mb-3">
                <center>
                    <div class="card" style="width: 18rem;">
                        <img src="pics/buy-med-card.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Buy/Donate Medicines</h5>
                            <p class="card-text">Donate your unused meds for financially poor people. You can even buy medicines at cheaper price compared to the market price.</p>
                        </div>
                    </div>
                </center>
            </div>
        </div>
        <div class="row bg-danger mt-4 mb-2" id="devBy">
            <div class="col-md-12">
                <center>
                    <span style="font-size:30px;color: white;">Meet the Developers</span>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-8 offset-md-2 bg-primary">
                                <center>
                                    <span style="font-size:22px;color: white;">Developed by:-</span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="row">
                                    <div class="col-md-5 mt-3">
                                        <center>
                                            <img src="pics/agent.jpg" alt="" style="width: 140px; border-radius: 50%;">
                                        </center>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <center>
                                        Anshul Garg <br>
                                        2nd Year COE <br>
                                        Thapar University <br>
                                        anshulg2211@gmail.com <br>
                                        79737-61975
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-8 offset-md-2 bg-info">
                                <center>
                                    <span style="font-size:22px;color: white;">Under the Guidance of:-</span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-md-5 mt-3">
                                <center>
                                    <img src="pics/sirpic.jpg" alt="" style="width: 140px; border-radius: 50%">
                                </center>
                            </div>
                            <div class="col-md-6 mt-4">
                               <center>
                                Rajesh Bansal <br>
                                Author of Real Java<br>
                                Bangalore Computers <br>
                                bcebti@gmail.com <br>
                                98722-46056
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-dark mt-3" id="reachUs">
            <div class="col-md-1 mt-1 mb-1 ml-3 px-0">
                <span style="font-size:20px;color: white;"><u>Reach Us:-</u></span>
            </div>
            <div class="col-md-3 mt-5 mb-1 pl-0">
                <center>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1219.0080505389665!2d74.95132690634503!3d30.212102487965655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1607088383160!5m2!1sen!2sin" max-width="450" max-height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </center>
            </div>
            <div class="col-md-1 offset-md-3 mt-1 pr-0">
                <span style="font-size:20px;color: white;"><u>Contact:-</u></span>
            </div>
            <div class="col-md-2 mt-5">
                <a href="https://www.instagram.com/anshulg2211/" style="color: lightgrey; font-size: 20px;" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i> Instagram
                </a><br>
                <hr class="bg-secondary">
                <a href="https://www.facebook.com/anshul.garg.52687/" style="color: lightgrey; font-size: 20px;" target="_blank">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook
                </a><br>
                <hr class="bg-secondary">
                <a href="https://www.linkedin.com/in/anshul-garg-5476191ba/" style="color: lightgrey; font-size: 20px;" target="_blank">
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn
                </a>
            </div>
        </div>
        <div class="row bg-dark">
            <div class="col-md-12 mb-2">
                <hr class="bg-secondary">
                <center>
                    <span style="color: lightgrey">
                        ©Copyright MedTorrent(2020) Anshul Garg. All Rights Reserved
                    </span>
                </center>

            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="forgotUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Username</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="generate-otp.php">
                        <div class="container-fluid px-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="regMob">Enter Registered Mobile No:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-2">
                                    <input type="text" id="regMob" name="regMob" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <center>
                                        <input type="button" class="btn btn-primary" value="Get OTP" id="getOtp">
                                    </center>
                                </div>
                            </div>
                            <span id="sentOtp"></span>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="otp">Enter OTP:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" id="otp" name="otp" class="form-control">
                            </div>
                        </div>
                        <center>
                            <button type="button" class="btn btn-success mt-3" id="submitOTP" name="submitOTP">Submit</button>
                        </center>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="showDetails">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Username: </b><span id="userDet">#</span> <br>
        <b>Password: </b><span id="passDet">*</span> <br>
      </div>
    </div>
  </div>
</div>
</body>

</html>
