angular.module('PokeApi', [])
    .controller('DashboardCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get('http://localhost/jsonMashup/public/dashboard').then(function (response) {
            console.log(response)
            $scope.data = response.data;
        });

    }]);
