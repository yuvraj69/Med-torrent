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
    <script src="js/angular.min.js"></script>
    <title>Manage Medicines</title>
    <script>
        function payment(type) {
            //var type = document.getElementById("choice").value;
            if (type == "Sell")
                document.getElementById("hid").style = "display:block;";
            else if (type == "Donate")
                document.getElementById("hid").style = "display:none;";
        }

    </script>
    <script>
        var module = angular.module("medmodule", []);
        module.controller("medcontroller", function($scope, $http) {
            $scope.user = "<?php echo $_SESSION["activeuser"];?>";
            $scope.fetchJSON = function() {
                /*var user = angular.element(document.getElementById("user"));
                $scope.kuchbhi=user.val();*/
                var url = "med-manager-back.php?user=" + $scope.user;
                $http.get(url).then(success, fail);

                function success(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArray = response.data;
                }

                function fail(error) {
                    alert(error.data);
                }
            }
            $scope.confirmRemove = function(rid)
            {
                $scope.x = rid;
            }
            $scope.DeleteMed = function() {
                var url = "delete-med.php?rid=" + $scope.x;
                $http.get(url).then(done, notdone);

                function done(response) {
                    alert(response.data);
                }

                function notdone(error) {
                    alert(error.data);
                }
                $scope.fetchJSON();
            }
            $scope.UpdateMed = function(rid) {
                var url = "update-med.php?rid=" + rid;
                $http.get(url).then(done, notdone);

                function done(response) {
                    $scope.updateArray = response.data;
                    var mode = $scope.updateArray[0].mode;
                    $scope.choseTo = $scope.updateArray[0].choseto;
                    $scope.type = $scope.updateArray[0].type;
                    if ($scope.choseTo == "Sell")
                        document.getElementById("hid").style = "display:block;";
                    else if ($scope.choseTo == "Donate")
                        document.getElementById("hid").style = "display:none;";
                    if (mode == "Cash")
                        document.getElementById("radCash").checked = true;
                    else if (mode == "Paytm")
                        document.getElementById("radPaytm").checked = true;
                    else if (mode == "Any")
                        document.getElementById("radAny").checked = true;
                    else if (mode == "NetBanking")
                        document.getElementById("radNB").checked = true;
                }

                function notdone(error) {
                    alert(error.data);
                }
            }

        });

    </script>
    <script>
        $(document).ready(function() {
            $("#UpdateBtn").click(function() {
                var queryString = $("#Updatemedicine").serialize();
                var rid = document.getElementById("ridTxt").value;
                $.get("update-med-sendtoserver.php?" + queryString + "&rid=" + rid, function(response) {
                    alert(response);
                })

            });
        });

    </script>
</head>

<body ng-app="medmodule" ng-controller="medcontroller" ng-init="fetchJSON();">
    <div class="container">
        <br>
        <div>
            <center>
                <b>Username: </b>
                <input type="text" ng-model="user" readonly>
                <!--<input type="button" value="Fetch" class="btn btn-primary ml-3" ng-click="fetchJSON();">-->
            </center>
        </div><br>
        <table class="table table-bordered table-hover text-center align-middle table-striped">
            <thead>
                <tr class="table-info">
                    <th scope="col">Sr No.</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Update</th>
                    <th scope="col">Remove AD</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="obj in jsonArray">
                    <th scope="row">{{$index+1}}</th>
                    <td>{{obj.medname}}</td>
                    <td>{{obj.company}}</td>
                    <td>{{obj.quantity}} {{obj.type}}</td>
                    <td>{{obj.choseto}}</td>
                    <td>{{obj.offeredprice}}</td>
                    <td>
                        <input type="button" data-toggle="modal" data-target="#updateModal" value="Update" ng-click="UpdateMed(obj.rid);" class="btn btn-outline-success">
                    </td>
                    <td>
                        <input type="button" value="Remove Ad" data-toggle="modal" data-target="#removeAdModal" ng-click="confirmRemove(obj.rid);" class="btn btn-outline-danger">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="modal" tabindex="-1" id="updateModal">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Medicine Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="post" enctype="multipart/form-data" id="Updatemedicine">
                                <div class="form-row">
                                    <div class="col-md-4 form-group">
                                        <input type="hidden" id="ridTxt" value="{{updateArray[0].rid}}">
                                        <label for="user">Username:</label>
                                        <center>
                                            <input type="text" name="user" id="user" class="form-control" readonly value="{{updateArray[0].username}}">
                                        </center>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-5 form-group">
                                        <label for="mname">Medicine Name:</label>
                                        <center>
                                            <input type="text" name="mname" id="mname" class="form-control" value="{{updateArray[0].medname}}">
                                        </center>
                                    </div>
                                    <div class="col-md-5 form-group offset-md-1">
                                        <label for="company">Company:</label>
                                        <center>
                                            <input type="text" name="company" id="company" class="form-control" value="{{updateArray[0].company}}">
                                        </center>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 form-group">
                                        <label for="expiry">Expiry Date:</label>
                                        <center>
                                            <input type="date" name="expiry" id="expiry" class="form-control" value="{{updateArray[0].expiry}}">
                                        </center>
                                    </div>
                                    <div class="col-md-2 form-group offset-md-1">
                                        <label for="quantity">Quantity:</label>
                                        <center>
                                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{updateArray[0].quantity}}">
                                        </center>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="type">Type:</label>
                                        <center>
                                            <select name="type" id="type" class="form-control" ng-model="type">
                                                <option value="Tablet">Tablet</option>
                                                <option value="Strips">Strips</option>
                                            </select>
                                        </center>
                                    </div>
                                    <div class="col-md-2 form-group offset-md-1">
                                        <label for="choice">Want To:</label>
                                        <center>
                                            <select name="choice" id="choice" class="form-control" onchange="payment(this.value);" ng-model="choseTo">
                                                <!--<option value="None">Select</option>-->
                                                <option value="Donate">Donate</option>
                                                <option value="Sell">Sell</option>
                                            </select>
                                        </center>
                                    </div>
                                </div>
                                <div id="hid">
                                    <div class="form-row">
                                        <div class="col-md-5 form-group">
                                            <label for="mrp">Price(MRP):</label>
                                            <center>
                                                <input type="text" name="mrp" id="mrp" class="form-control" value="{{updateArray[0].mrp}}">
                                            </center>
                                        </div>
                                        <div class="col-md-5 form-group offset-md-1">
                                            <label for="price">Offered Price:</label>
                                            <center>
                                                <input type="text" name="price" id="price" class="form-control" value="{{updateArray[0].offeredprice}}">
                                            </center>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 form-group">
                                            <label for="">Mode of Payment:</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-2 form-group">
                                            <input type="radio" name="rad" id="radCash" value="{{updateArray[0].mode}}"><label class="radStyle" for="radCash">Cash</label>
                                        </div>
                                        <div class="col-md-2 offset-md-1 form-group">
                                            <input type="radio" name="rad" id="radNB" value="NetBanking"><label class="radStyle" for="radNB">Net Banking</label>
                                        </div>
                                        <div class="col-md-2 offset-md-1 form-group">
                                            <input type="radio" name="rad" id="radPaytm" value="Paytm"><label class="radStyle" for="radPaytm">Paytm</label>
                                        </div>
                                        <div class="col-md-2 offset-md-1 form-group">
                                            <input type="radio" name="rad" id="radAny" value="{{updateArray[0].mode}}"><label class="radStyle" for="radAny">Any</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="UpdateBtn">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="removeAdModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Ad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this ad?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" ng-click="DeleteMed();" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
