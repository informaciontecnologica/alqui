<!DOCTYPE html>
<html ng-app="myApp">
    <html>
        <head>     
            <?php
            include 'controles/cabezera.php';
            include 'controles/funciones.php';
            include'controles/cookies.php';
            ?>
            <link href="style.css" rel="stylesheet" type="text/css"/>
            <script src="js/propietarios.js" type="text/javascript"></script>
            <style type="text/css">
            
                #map_canvas {
                    position: relative;
                }
                .angular-google-map-container {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    right: 0;
                    left: 0;
                }
            </style>
        </head>
        <body  ng-controller="customersCtrl"  >
            <header>
                <?php navegador($estado); ?>
            </header>
            <h3 class="text-center"> Propietarios</h3> 
            <div class="container-fluid" 
                 ng-init="userInit('<?php echo $_SESSION['Nombre'] . "', '" . $_SESSION['perfil'] ?>')" >
                <div class="container" >

                    <div class="row">

                        <div class="col-md-6 "   > 
                            <!--                            <div class="text-right" >   
                                                            <button class="btn"   formaction="Adminagentes.php">
                                                                <span class="glyphicon glyphicon-pencil"> Nuevo</span>
                                                            </button>
                                                            <button class="btn"   ng-click="Contenido()">
                                                                <span class="glyphicon glyphicon-pencil">Contenido</span>
                                                            </button>
                                                        </div>  -->
                        </div>
                    </div>
                    <div class="row" ng-show="Listado">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label>Buscar</label><input ng-model="buscar" type="text">

                            </div>
                            <table class="table table-striped"  > 
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Nombre, Apellido
                                        </th>
                                        <th>
                                            Dirección
                                        </th>

                                        <th>
                                            Propiedades
                                        </th>
                                        <th>
                                            Alquileres
                                        </th>
                                    </tr>
                                </thead>

                                <tbody ng-repeat="x in propietarios| filter:buscar">
                                    <tr>
                                        <td>
                                            {{x.idpersonas}} 
                                        </td>
                                        <td>
                                            {{x.nombre}} 

                                            {{x.apellido}} 
                                        </td>
                                        <td>
                                            {{x.direccion}}
                                        </td>
                                        <td>
                                            {{x.direccion}} 
                                        </td>
                                        <td>
                                            <button type="button" ng-click="propa(x.idpersonas);" 
                                                    id="de{{x.idpersonas}}" 
                                                    class="glyphicon glyphicon-list" title="Propiedades" 
                                                  
                                                    data-nombres="{{x.nombre}},  {{ x.apellido}} "
                                                    data-toggle="modal" data-target="#myModal"></button>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>




                    <?php
//
//                    if (isset($_POST["Agregar"])) {
//                        $FPublicacion = $_POST["FPublicacion"];
//                        $superficie = utf8_decode($_POST["superficie"]);
//                        $direccion = utf8_decode($_POST["direccion"]);
//                        $valor = $_POST["valor"];
//                        $descripcion = $_POST["Descripcion"];
//                        $banos = $_POST["banos"];
//                        $habitaciones = $_POST["habitaciones"];
//                        $pileta = $_POST["pileta"];
//                        $otros = $_POST["otros"];
//                        $tipopropiedad = after(':', $_POST["tipopropiedad"]);
//                        $id_pais = after(':', $_POST["pais"]);
//                        $id_provincia = after(':', $_POST["provincia"]);
//                        $id_departamento = after(':', $_POST["departamento"]);
//                        $id_municipio = after(':', $_POST["municipio"]);
//                        $id_ciudad = after(':', $_POST["ciudad"]);
//                        $id_barrio = after(':', $_POST["barrio"]);
//                        $localizacion = $_POST["localizacion"];
//
//                        /*                         * *         nueva persona */
//                        if ((isset($_POST["Agregar"])) && ($_POST['Agregar'] == "Agregar")) {
//                            $NuevoProp = new MySQL();
//                            $sql = "INSERT INTO `propiedades`( `FPublicacion`, `superficie`, `direccion`, `valor`,"
//                                    . "`Descripcion`, `banos`, `habitaciones`, `pileta`, `otros`, `tipopropiedad_id_tipoPropiedad`"
//                                    . ", `idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`, `localizacion`)"
//                                    . "VALUES ('$FPublicacion',$superficie, '$direccion', $valor,"
//                                    . "'$descripcion', $banos, $habitaciones, '$pileta', '$otros', $tipopropiedad"
//                                    . ", '$id_barrio', '$id_ciudad', '$id_municipio', '$id_departamento', '$id_provincia', '$id_pais'"
//                                    . ",'$localizacion')";
////                            echo $sql . "<br>" . $FPublicacion . "<br>";
//                            $insertar = $NuevoProp->consulta($sql);
//                        }
//                    }
//
//                    if (isset($_POST["Modificar"])) {
//                        $FPublicacion = $_POST["FPublicacion"];
//                        $superficie = utf8_decode($_POST["superficie"]);
//                        $direccion = utf8_decode($_POST["direccion"]);
//                        $valor = $_POST["valor"];
//                        $descripcion = $_POST["Descripcion"];
//                        $banos = $_POST["banos"];
//                        $habitaciones = $_POST["habitaciones"];
//                        $pileta = $_POST["pileta"];
//                        $otros = $_POST["otros"];
//                        $tipopropiedad = after(':', $_POST["tipopropiedad"]);
//                        $id_pais = after(':', $_POST["pais"]);
//                        $id_provincia = after(':', $_POST["provincia"]);
//                        $id_departamento = after(':', $_POST["departamento"]);
//                        $id_municipio = after(':', $_POST["municipio"]);
//                        $id_ciudad = after(':', $_POST["ciudad"]);
//                        $id_barrio = after(':', $_POST["barrio"]);
//                        $localizacion = $_POST["localizacion"];
//
//                        $idpropiedad = $_POST['idpropiedad'];
//                        $ModiProp = new MySQL();
//                        $sql = "update  `propiedades` set `FPublicacion`='$FPublicacion', `superficie`=$superficie, `direccion`='$direccion', `valor`=$valor,"
//                                . "`Descripcion`='$descripcion', `banos`=$banos, `habitaciones`=$habitaciones, `pileta`='$pileta', `otros`='$otros', `tipopropiedad_id_tipoPropiedad`=$tipopropiedad"
//                                . ", `idbarrio`='$id_barrio', `idciudad`='$id_ciudad', `idmunicipio`='$id_municipio', `iddepartamento`='$id_departamento', `idprovincia`='$id_provincia'"
//                                . ", `idpais`='$id_pais', `localizacion`='$localizacion' where idpropiedad=$idpropiedad";
//
//                        echo $sql . "<br>" . $idpropiedad . "<br>";
//                        $insertar = $ModiProp->consulta($sql);
//                    }
//                    $ultimoid = new MySQL();
//                    $cade = "SELECT MAX(idpersonas) AS id FROM personas";
//                    $veri = $ultimoid->consulta($cade);
//                    while ($rs = mysql_fetch_array($veri)) {
//                        $id = $rs["id"];
//                    }
//                    $AgregarPersonasusuarios = new MySQL();
//                    $NPU = "insert into `personas usuario` (idpersonas,idusuario) values ($id,$idusuario)";
//                    $AgregarPEr = $AgregarPersonasusuarios->consulta($NPU);
//
//                    $ActPerfil = new MySQL();
//                    $sql = "update usuario set id_perfil=$perfil , mail='$mail' where id_usuario=$idusuario";
//                    $Actp = $ActPerfil->consulta($sql);
                    ?>
                    <?php include 'pie.php'; ?>
                </div>



                <!--         Modal 
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">    
                                 Modal content
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Propiedades</h4>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="text-center  ">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-3 " for="email">Email address:</label>
                                                <input class="col-md-3 "  type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 "  for="pwd">Password:</label>
                                                <input class="col-md-3 "  type="password" class="form-control" id="pwd">
                                            </div>
                                           
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                
                            </div>
                        </div>-->

                <!-- Modal lista de propiedades que tiene un propietario-->
                <div class="modal fade " id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">    
                        <!-- Modal content-->
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Propiedades - {{nombres}} </h4>
                            </div>
                            <div class="modal-body ">
                                <div class="text-center  ">
                                    <table class="table ">
                                        <tr>
                                            <td>
                                                Id 
                                            </td>
                                            <td>
                                                Dirección 
                                            </td> 
                                            <td>
                                                Valor
                                            </td>
                                            <td>
                                                Descripción
                                            </td>
                                            <td>
                                                Estado
                                            </td>
                                        </tr> 
                                        <tbody ng-repeat="p in propiedades">
                                            <tr>
                                                <td>
                                                    {{p.idpropiedad}}   
                                                </td>
                                                <td>
                                                    {{p.direccion}}   
                                                </td>

                                                <td>
                                                    $ {{ p.valor}}
                                                </td>
                                                <td>
                                                    {{p.Descripcion}}
                                                </td>
                                                <td>
                                                    <button type="button" ng-click="" title="Baja" data-toggle="modal" data-target="#listapropiedades">
                                                        <span class="glyphicon  glyphicon-minus-sign"></span></button>
                                                </td>
                                                // Agregar una propiedad al propietario, borrar la propiedad al propietario y registrar a un historico , 
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--Boton abre modal de propiedades que no están relacionadas con ningún propietario para poder agregarlas-->
                                <button type="button" ng-click="Verpropiedades(pap);" class="btn btn-primary pull-left" title="Agregar Propiedad"
                                        data-toggle="modal" data-target="#listapropiedades">Agregar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
        </body>
        <div class="modal fade " id="listapropiedades" role="dialog">
                    <div class="modal-dialog modal-lg" role="document"> 
                         <!-- Modal content-->
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Propiedades - {{nombres}} </h4>
                            </div>
                            <div class="modal-body ">
                                <div class="text-center  ">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--Boton abre modal de propiedades que no están relacionadas con ningún propietario para poder agregarlas-->
                                <button type="button" ng-click="Verpropiedades(pap);" class="btn btn-primary pull-left" title="Agregar Propiedad"
                                        data-toggle="modal" data-target="#listapropiedades">Agregar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>     
        </div>

    </html>
