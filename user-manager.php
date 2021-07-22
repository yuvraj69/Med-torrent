<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Manager</title>
    <script src="js/angular.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    var koimodule = angular.module("anymodule",[]);
    koimodule.controller("controllerany",function($scope,$http){
        
        $scope.fetchJSON=function()
        {
            var url = "users-table.php";
            $http.get(url).then(success,fail);
            function success(response)
            {
                //alert(JSON.stringify(response.data));
                $scope.jsonArray=response.data;
            }
            function fail(error)
            {
                alert(error.data);
            }
        }
        $scope.deleteKro=function(user)
        {
            var url="delete-user.php?user="+user;
            $http.get(url).then(done,notdone);
            function done(response)
            {
                alert(response.data);
            }
            function notdone(error)
            {
                alert(error.data);
            }
            $scope.fetchJSON();
        }
        $scope.BlockMaro=function(user)
        {
            var url="block-user.php?user="+user;
            $http.get(url).then(done,notdone);          
            function done(response)
            {
                alert(response.data);
            }
            function notdone(error)
            {
                alert(error.data);
            }
            $scope.fetchJSON();
        }
        $scope.ResumeKrlo=function(user)
        {
            var url="resume-user.php?user="+user;
            $http.get(url).then(done,notdone);          
            function done(response)
            {
                alert(response.data);
            }
            function notdone(error)
            {
                alert(error.data);
            }
            $scope.fetchJSON();
        }
        
});
    </script>
</head>
<body ng-app="anymodule" ng-controller="controllerany" ng-init="fetchJSON();">
  <div class="container">
   <table class="table table-bordered align-middle text-center mt-5 table-dark table-hover">
      <thead>
       <tr>
           <th>Sr. No.</th>
           <th>Username</th>
           <th>Password</th>
           <th>Mobile</th>
           <th>Status</th>
           <th>Delete</th>
           <th>Block</th>
           <th>Resume</th>
       </tr>
       </thead>
       <tbody>
       <tr ng-repeat="obj in jsonArray">
           <td>{{$index+1}}</td>
           <td>{{obj.username}}</td>
           <td>{{obj.password}}</td>
           <td>{{obj.mobile}}</td>
           <td>{{obj.status}}</td>
           <td>
               <input type="button" value="Delete" ng-click="deleteKro(obj.username);" class=" btn btn-danger">
           </td>
           <td>
               <input type="button" value="Block" ng-click="BlockMaro(obj.username);" class=" btn btn-secondary">
           </td>
           <td>
               <input type="button" value="Resume" ng-click="ResumeKrlo(obj.username);" class=" btn btn-success">
           </td> 
       </tr>
       </tbody>
   </table>
    </div>
</body>
</html>