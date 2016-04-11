<!DOCTYPE html>
<html>
<link rel="stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<head>
    <script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("personas.php").success(function(response) {$scope.names = response.records;});
$scope.numero=0;
$scope.edit = true;
$scope.error = false;
$scope.incomplete = false; 

$scope.editUser = function(id) {
  if (id == 'new') {
    $scope.edit = true;
    $scope.incomplete = true;
    $scope.nombre = '';
    $scope.apellido = '';
    } else {
    $scope.edit = false;
    
    $scope.nombre = $scope.names[id].nombre;
    $scope.apellido = $scope.names[id].apellido; 
    $scope.direccion = $scope.names[id].direccion; 
    $scope.idpersonas = $scope.names[id].idpersonas;
  }
};
});
</script>
</head>
<body ng-app="myApp" ng-controller="customersCtrl">

<h3>Users</h3>


<table class="table table-condensed">
    <tr ng-repeat="x in names"> 
        <td >
    {{ $index + 1 }}
        </td>
        <td >
    {{ x.nombre+ ', ' + x.apellido }}
        </td>
        <td >
            {{ x.idpersonas}}
        </td>
        <td >
             <button class="btn"   ng-click="editUser($index)">
                <span class="glyphicon glyphicon-pencil"></span>
       &nbsp;&nbsp;Editar-{{ x.idpersonas}}
      </button>
        </td>
        
  </tr>
</table>


<hr>
<button class="btn btn-success" ng-click="editUser('new')">
  <span class="glyphicon glyphicon-user"></span> Create New User
</button>
<hr>


<h3 ng-show="edit">Create New User:</h3>
<h3 ng-hide="edit">Edit User:</h3>

<form class="form-horizontal"  method="post" action="" >
    
<div class="form-group">
  <label class="col-sm-2 control-label">Nombre:</label>
  <div class="col-sm-10">
      <input type="text" ng-model="nombre" name="nombre" placeholder="First Name">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label">Apellido:</label>
  <div class="col-sm-10">
    <input type="text" ng-model="apellido"  placeholder="Last Name">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Direccion:</label>
  <div class="col-sm-10">
      <input type="text" ng-model="direccion"  placeholder="Password">
  </div>
</div>
<div class="form-group">

  <div class="col-sm-10">
      <input type="hidden" name="idpersonas" ng-value="idpersonas"   ng-model="idpersonas" >
     <!--<input type="hidden" name="id" value"idpersonas">-->        
  </div>
</div>
    <button class="btn btn-success" name="salvar" ng-model="salvar" >
<span class="glyphicon glyphicon-save"></span>  Modificar </button>
</form>
</body>

    <?php
if (isset($_POST['salvar'])){
$nombre =$_POST['nombre'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$apellido =$_POST['apellido'];
$fecha=$_POST['fecha'];
$documento=$_POST['documento'];
$mail=$_POST['mail'];

$db= new MySQL;


    }
    
?>

</html>