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
    <title>Search Diseases</title>
    <script>
        var module = angular.module("searchmedmod", []);
        module.controller("searchmedcon", function($scope, $http) {
            $scope.fetchCateg = function() {
                var url = "search-disease-fetch-category.php";
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.jsonArray = response.data;
                }

                function fail(error) {
                    alert(error.data);
                }
            }
            $scope.ShowSel = function() {
                var url = "search-disease-fetch-dis.php?category=" + $scope.selCateg.category;
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.medArray = response.data;
                }

                function fail(error) {
                    alert(error.data);
                }
            }
            $scope.showDis = function() {
                //alert($scope.selMedObj.medname + "   " + $scope.selCity.city);
                var category = $scope.selCateg.category;
                var disease = $scope.selDisObj.disease;
                var url = "search-disease-uploads.php?category=" + category + "&disease=" + disease;
                $http.get(url).then(success, fail);

                function success(response) {
                    $scope.jsonDisUploads = response.data;
                    //alert(JSON.stringify($scope.jsonDisUploads));
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

<body ng-app="searchmedmod" ng-controller="searchmedcon" ng-init="fetchCateg();">
    <div class="container">
        <div class="row bg-success mb-5">
            <div class="col-md-12">
                <center>
                    <span style="color:white; font-size: 30px;"><b>Search Diseases</b></span>
                </center>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="form-group col-md-3 offset-md-2">
                <label for="selcateg">Select Category:</label>
                <select ng-model="selCateg" ng-change="ShowSel();" ng-options="obj.category for obj in jsonArray" id="selcateg" class="form-control">
                </select>
            </div>
            <div class="form-group col-md-3 offset-md-2">
                <label for="seldisease">Select Disease:</label>
                <select ng-model="selDisObj" ng-options="obj.disease for obj in medArray" id="seldisease" class="form-control">
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-2 offset-md-5">
                <center>
                    <input type="button" class="btn btn-danger form-control" value="Search Diseases" ng-click="showDis();">
                </center>
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
        <table class="table table-bordered mt-5 table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col" class="align-middle text-center">Sr No.</th>
                    <th scope="col" class="align-middle text-center">Symptoms</th>
                    <th scope="col" class="align-middle text-center">Recommended Doctor</th>
                    <th scope="col" class="align-middle text-center">Suggestions</th>
                    <th scope="col" class="align-middle text-center">Contact</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="obj in jsonDisUploads">
                    <th scope="row">{{$index+1}}</th>
                    <td>{{obj.symptoms}}</td>
                    <td>{{obj.recommendations}}</td>
                    <td>{{obj.suggestions}}</td>
                    <td class="align-middle">
                        <input type="button" ng-click="contactDetails(obj.username);" class="btn btn-primary py-1" data-toggle="modal" data-target="#contactModal" value="Contact Person">
                    </td>
                </tr>
            </tbody>
        </table>
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
