var myApp = angular.module("myApp", ['ngRoute']);
myApp.config(["$routeProvider", function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "listing.php"
        })
        .when("/create", {
            templateUrl : "create.php"
        })
        .when('/update/:id', {
            templateUrl : "update.php",
        });
}]);