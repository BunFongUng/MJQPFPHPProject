myApp.controller("MenuController",["$scope", "$http","$location", "$routeParams",function($scope, $http, $location, $routeParams) {
    $scope.title = "";
    $scope.insertData = function() {
        $http.post("ajax_script/insertData.php", {
            "title" : $scope.title,
            "parent" : $scope.parent
        }).success(function(data) {
            if(data[0].required == "Record Has Been Inserted!") {
                $location.path('/');
            } else {
                $scope.errors_report = data;
            }
        });
    };

    $scope.fetchValue = function(id) {
        $http.post("ajax_script/updateData.php", {
            "id" : id
        }).success(function(data) {
            $scope.title = data.MenuTitle;
            console.log($scope.title);
        });
    };

    $scope.getAll = function() {
        $http.get("ajax_script/fetchData.php")
            .success(function(responseData) {
               $scope.menus = responseData;
            });
    };
    $scope.getAll();


}]);