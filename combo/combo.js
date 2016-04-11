var angularTodo = angular.module('selectsDesarrolloHidrocalido', []);
function controllerForm($scope, $http) {
      $scope.JSONCategorias = [ ];
      $scope.JSONPistos     = [ ];
      obtenerCategorias($http,$scope);
      // $scope que acciona la funcion ng-click="limpiar()" LIMPIAR
      $scope.limpiar = function() {
        limpiarForm($scope);
      };
      // $scope que acciona el ng-change
      $scope.mostrarPistos = function() { 
        // $scope.selCategorias NOS TRAE EL VALOR DEL SELECT DE CATEGORIAS
         obtenerPistos($http,$scope,$scope.selCategorias)
      };

 } 
//  function obtenerPistos($http,$scope,idCategoria){
//       $http.post('model/index.php',{ metodo : 'obtenerPistos' , idCategoria : idCategoria })
//        .success(function(data) {
//            var array = data == null ? [] : (data.pistos instanceof Array ? data.pistos : [data.pistos]);
//            $scope.JSONPistos  = array;
//            $scope.selPistos   = $scope.JSONPistos;
//        })
//        .error(function(data) {
//            console.log('Error: ' + data);
//        });    
//  }
  function obtenerCategorias($http,$scope){
       $http.post('controles/Get_all_pais.php',{ metodo : 'obtenerCategorias' })
        .success(function(data) {
//          El operador instanceof devuelve verdadero si el objeto especificado es del tipo especificado.
            var array = data == null ? [] : (data.pais instanceof Array ? data.pais : [data.pais]);
            $scope.JSONCategorias  = array;
            $scope.selCategorias   = $scope.JSONCategorias;
        })
        .error(function(data) {
            console.log('Error: ' + data);
        });    
  }
  function limpiarForm($scope){
    $scope.selPistos = '';
    $scope.selCategorias = '';
  }