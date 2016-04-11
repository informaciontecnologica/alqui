<html  ng-app="myApp">
    <head>
        <title></title>
        <!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="functions.js"></script>-->
        <script src="jquery/angular.min.js" type="text/javascript"></script>
        <script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <script src="a.js" type="text/javascript"></script>
        <style>
            .fotoproa{
                width: 130px;
                height: 120px;
            }
            .fotoproa:hover{
                width: 250px;
                height: 250px;
                z-index: 2;
            }
            .de{
                float: left;
                width: 130px;
                height: 120px;
            }

        </style>
    </head>
    <body ng-controller="Ctrl">
       

        <div class=" col-md-12 row">  
            
            <div ng-repeat="f in fotos"> 
                <img  src="imagenes/Personal/fotos/propiedad/3/{{f.foto}}" 
                      data-toggle="modal" 
                      data-target="#myModal"
                      data-whatever="imagenes/Personal/fotos/propiedad/3/{{f.foto}}"
               
                      class="fotoproa" alt="{{f.foto}}"  >
            </div>
        </div>

        <!--        <div class="row">
                    <form name="foto" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" value="" />
                    </form>
                </div>-->
        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

        <div class="modal fade " id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal </p>
                       
                            <img  src="" id="venta" class="de" alt=""  >
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div></div>


                <script>

    
    
    var myApp = angular.module('myApp', []);
                            myApp.controller('Ctrl', function ($scope, $http) {

        //                    //    Cambio Provinica
        //                    //    $scope.foto = function () {
                                $http.post("controles/Get_foto.php", {
                                    idpropiedad: 3

                                }).success(function (responses) {
                                    $scope.fotos = responses.fotopropiedad;
                                });
        //                            $scope.modalButtonClick = function () {
        //                            var modalInstance = $modal.open({
        //                            templateUrl: 'pie.php',
        //                                    controller: 'modalController',
        //                                    windowClass: 'app-modal-window'
        //                            });
        //                            };
                            });
$('#myModal').on('show.bs.modal', function (event) {
//  var button = $(event.relatedTarget) // Button that triggered the modal
//  var recipient = button.data('whatever') // Extract info from data-* attributes
//////  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//////  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('New message to ');
////////  modal.find('.modal-body input').val(recipient)
//  modal.find('.modal-body img').attr('src',recipient)
//alert('asdas');
//  
});
                </script>

                </body>
                </html>