/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
                var myApp = angular.module('myApp', []);

                myApp.controller('customersCtrl', function ($scope, $http) {


                    $http.get("controles/get_all_pais.php").success(function (response) {
                        $scope.paises = response.pais;
                    });


//      CAmbio PAis
                    $scope.CambioPais = function () {
//                       alert('Template is : '+$scope.pais);

                        $http.post("..controles/Get_provincia.php", {pais: $scope.pais}).success(function (responses) {
                            $scope.provincias = responses.provincia;

                        });
                    };
//    Cambio Provinica
                    $scope.CambioProvincia = function () {
                       //alert('Template is : '+$scope.pais                             +'---'+$scope.provincia);

                        $http.post("controles/Get_departamento.php", {pais: $scope.pais, provincia: $scope.provincia}).success(function (responses) {
                            $scope.departamentos = responses.departamento;

                        });
                    };
//   Cambio Departamento
                    $scope.CambioDepartmento = function () {
                      // alert('Template is : '+$scope.departamento);

                        $http.post("controles/Get_municipio.php", {pais: $scope.pais, provincia: $scope.provincia, departamento:$scope.departamento}).success(function (responses) {
                            $scope.municipios = responses.municipio;

                        });
                    };
                    
//    Cambio municipio
                    $scope.CambioMunicipio = function () {
//                       alert('Template is : '+$scope.pais);

                        $http.post("controles/Get_ciudad.php", {pais: $scope.pais, provincia: $scope.provincia, departamento:$scope.departamento, municipio:$scope.municipio}).success(function (responses) {
                            $scope.ciudades = responses.ciudad;

                        });  
                    };
//    Cambio Ciudad
                    $scope.CambioCiudad = function () {
//                       alert('Template is : '+$scope.pais);

                      $http.post("controles/Get_barrio.php", {
                          pais: $scope.pais, 
                          provincia: $scope.provincia, 
                            departamento:$scope.departamento, 
                            municipio:$scope.municipio,
                            ciudad:$scope.ciudad}).success(function (responses) {
                            $scope.barrios = responses.barrio;

                        });
                    };
//    cambio Barrio 
                    $scope.CambioBarrio = function () {
//                       alert('Template is : '+$scope.pais);

                        $http.post("controles/Get_barrio.php", {pais: $scope.pais, provincia: $scope.provincia, 
                            departamento:$scope.departamento, ciudad:$scope.ciudad}).success(function (responses) {
                            $scope.barrios = responses.barrio;

                        });
                    };                    

                });







