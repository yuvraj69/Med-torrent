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
        var module = angular.module("searchmedmod", []);
        module.controller("searchmedcon", function($scope, $http) {
            $scope.fetchCity = function() {
                var url = "search-med-fetch-city.php";
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.jsonArray = response.data;
                }

                function fail(error) {
                    alert(error.data);
                }
            }
            $scope.ShowSel = function() {
                var url = "search-med-fetch-meds.php?city=" + $scope.selCity.city;
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.medArray = response.data;
                }

                function fail(error) {
                    alert(error.data);
                }
            }
            $scope.showMeds = function() {
                //alert($scope.selMedObj.medname + "   " + $scope.selCity.city);
                var city = $scope.selCity.city;
                var med = $scope.selMedObj.medname;

                var url = "search-med-providers.php?city=" + city + "&medname=" + med;
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.jsonMedProviders = response.data;
                }

                function fail(response) {
                    alert(response.data);
                }
            }
            $scope.contactDetails = function(user) {
                var url = "search-med-fetch-users.php?user=" + user;
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.jsonContact = response.data;
                }

                function fail(response) {
                    alert(response.data);
                }
            }
        });

    </script>
</head>

<body ng-app="searchmedmod" ng-controller="searchmedcon" ng-init="fetchCity();">
    <div class="container">
        <div class="row bg-danger mb-5">
            <div class="col-md-12">
                <center>
                    <span style="color:white; font-size: 30px;"><b>Search Medicines</b></span>
                </center>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="form-group col-md-3 offset-md-2">
                <label for="selcity">Select City:</label>
                <select ng-model="selCity" ng-change="ShowSel();" ng-options="obj.city for obj in jsonArray" id="selcity" class="form-control">
                </select>
            </div>
            <div class="form-group col-md-3 offset-md-2">
                <label for="selmed">Select Medicine:</label>
                <select ng-model="selMedObj" ng-options="obj.medname for obj in medArray" id="selmed" class="form-control">
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-2 offset-md-5">
                <center>
                    <input type="button" class="btn btn-primary form-control" value="Search Medicines" ng-click="showMeds();">
                </center>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-md-4" ng-repeat="obj in jsonMedProviders">
               <center>
                <div class="card ml-2 mr-2 mb-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <center>{{obj.medname}}</center>
                        </h5>
                        <p class="card-text">
                            <b>Company:</b> &nbsp;&nbsp;{{obj.company}}
                        </p>
                        <p class="card-text">
                            <b>Expiry:</b> &nbsp;&nbsp;{{obj.expiry}}
                        </p>
                        <p class="card-text">
                            <b>Quantity:</b> &nbsp;&nbsp;{{obj.quantity}} {{obj.type}}
                        </p>
                        <p class="card-text">
                            <b>Price(in Rs.):</b> &nbsp;&nbsp;{{obj.offeredprice}}
                        </p>
                        <p class="card-text">
                            <b>Payment Mode:</b> &nbsp;&nbsp;{{obj.mode}}
                        </p>
                        <center>
                            <button ng-click="contactDetails(obj.username);" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">Contact Person</button>
                        </center>
                    </div>
                </div>
                </center>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="contactModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Name: &nbsp;&nbsp;</b>{{jsonContact[0].name}}</p>
                    <p><b>Contact: &nbsp;&nbsp;</b>{{jsonContact[0].mobile}}</p>
                    <p><b>Email: &nbsp;&nbsp;</b>{{jsonContact[0].email}}</p>
                    <p><b>Address: &nbsp;&nbsp;</b>{{jsonContact[0].address}} ({{jsonContact[0].city}})</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
