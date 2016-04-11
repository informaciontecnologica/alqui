/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('MyApp', []).
        controller('MainCtrl', ['$scope', function ($scope, $http) {

                $scope.addNom = function sendData($scope) {
                    $http({
                        
                        url: 'controles/registrarusuarios.php',
                        method: "POST",
                        data: {'usuario': usuario, 'password': password}
                    })
                            .then(function (response) {
                                // success
                            },
                                    function (response) { // optional
                                        // failed
                                    });
                };

            }])
        .directive('sameAs', function () {
            return {
                require: 'ngModel',
                link: function (scope, elm, attrs, ctrl) {
                    ctrl.$parsers.unshift(function (viewValue) {
                        if (viewValue === scope[attrs.sameAs]) {
                            ctrl.$setValidity('sameAs', true);
                            return viewValue;
                        } else {
                            ctrl.$setValidity('sameAs', false);
                            return undefined;
                        }
                    });
                }
            };
        });