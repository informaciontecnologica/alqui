/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $("#show_login").click(function () {
        showpopup();
    });
    $("#close_login").click(function () {
        hidepopup();
    });

});


function showpopup()
{
    $("#loginform").fadeIn();
    $("#loginform").css({"visibility": "visible", "display": "block"});
}

function hidepopup()
{
    $("#loginform").fadeOut();
    $("#loginform").css({"visibility": "hidden", "display": "none"});
}

//var myApp = angular.module('myApp', ['uiGmapgoogle-maps']);
var myApp = angular.module('myApp', []);
myApp.controller('customersCtrl', function ($scope, $http, $log, $filter) {

    $scope.Getpropiedad = function (id) {
        $http.post("controles/Get_propiedades_id.php", {
            idpropiedades: id

        }).success(function (responses) {
            $scope.propiedades = responses.propiedad;
            console.log(responses);
        });

    };
     $scope.Getsinpropietario = function () {
        $http.post("controles/Get_propiedades_sin_propietario.php", {
        }).success(function (responses) {
            $scope.sinpropiietario = responses.sinpropietario;
            console.log(responses);
        });

    };

    $scope.propa = function (id) {
        var element = document.querySelector('#de' + id);
        $scope.nombres = element.dataset.nombres;
        $scope.pap = id;
        $scope.Getpropiedad(id);
    };
    
    $scope.Verpropiedades = function (a) {
    $scope.sinpropiietario();

    };


    $http.post("controles/Get_propietarios.php", {
    }).success(function (responses) {
        $scope.propietarios = responses.propietarios;
    });




    //******
    $scope.Listado = true;
    $scope.cancelar = false;
    $scope.registros = false;
    $scope.Listafoto = false;

    $http.get("controles/Get_propiedades.php").success(function (response) {
        $scope.propiedades = response.propiedad;
    });


    $http.get("controles/Get_tipo_propiedad.php").success(function (response) {
        $scope.Tipopropiedades = response.Tipo_propiedad;
    });


    $scope.grabar = function () {
        $scope.registros = false;
        $scope.Listado = true;
        $scope.Listafoto = false;
    };



});

