/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var myApp = angular.module('indexx', []);
myApp.controller('xontrole', function ($scope, $http, $log, $filter) {
   
    $scope.promo= function (){
       $http.post("controles/promo.php", {
       }).success(function (responses) {
             $scope.promociones = responses.promocion;
        });  
};
    
    
});