<!DOCTYPE html>
<html ng-app="selectsDesarrolloHidrocalido" lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
     <br>
         <div class="row">
            <div class="col-md-5 col-md-offset-3">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Desarrollo Hidrocálido - Selects Anidados con Angular JS</h3>
                </div>
                  <div class="panel-body">
                    <form>
                        <fieldset ng-controller="controllerForm">
                            <div class="form-group">
                             <select ng-model="selCategorias" class="form-control" ng-change="mostrarPistos()" ng-options="categorias.idCategoria as categorias.descripcion for categorias in JSONCategorias">
                             </select>
                          </div>
                          <div class="form-group">
                             <select ng-model="selPistos" class="form-control" ng-options="pistos.idPisto as pistos.descripcion for pistos in JSONPistos">
                             </select> 
                          </div>
                          <div class="row">
                           <div class="col-md-12">
                            <input ng-click="limpiar()" class="btn btn-lg btn-default btn-block" type="button" value="Limpiar">
                           </div>
                          </div>
                        </fieldset>
                     </form>
                  </div>
              </div> <!-- Fin del panel panel-default -->
            </div>
          </div> <!-- Fin del Row --> 
     </div> <!-- Fin del Container -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <script src="combo/combo.js"></script>
    </body>
</html>