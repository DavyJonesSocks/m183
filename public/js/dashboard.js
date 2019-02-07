angular.module('PokeApi', ['ngDialog'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');

})
    .controller('DashboardCtrl', ['$scope', '$http', 'ngDialog', function ($scope, $http, ngDialog) {
        var req = {
            method: 'GET',
            url: '/dashboard',
            headers: {
                'Accept': 'application/json, */*',
                'Content-Type': 'application/json, */*'
            }
        };

        $http(req).then(function (response) {
            console.log(response)
            $scope.data = response.data;
        });

        $scope.showDetails = function (pokemon) {
            console.log(pokemon)
            ngDialog.open({
                template: 'templates/html/popup.html',
                data: {
                    pokemon: pokemon
                }
            });
        }

    }]);
