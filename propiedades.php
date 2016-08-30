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

            <script src="http://maps.googleapis.com/maps/api/js"></script>
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
            <script>
                function aa(val, val2) {
                    $("#search-box").val(val2);
//    $('#idpersonas').val(val);
                    $("#suggesstion-box").hide();
                    var idpersonas = $(val);


                }
                ;


            </script> 
        </head>
        <body  ng-controller="customersCtrl"  >
            <header>
                <?php navegador($estado); ?>
            </header>
            <h3 class="text-center"> Propiedades </h3> 
            <div class="container-fluid" 
                 ng-init="userInit('<?php echo $_SESSION['Nombre'] . "', '" . $_SESSION['perfil'] ?>')" >
                <div class="container" >

                    <div class="row">

                        <div class="col-md-6 "   > 
                            <div class="text-right" >   
                                <button class="btn"   ng-click="Nuevo()">
                                    <span class="glyphicon glyphicon-pencil"> Nuevo</span>
                                </button>
                                <button class="btn"   ng-click="Contenido()">
                                    <span class="glyphicon glyphicon-pencil">Contenido</span>
                                </button>
                            </div>  
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
                                            Superficie
                                        </th>
                                        <th>
                                            Dirección
                                        </th>
                                        <th>
                                            Valor
                                        </th>
                                        <th>
                                            Descripción
                                        </th>
                                        <th>
                                            Baños

                                        </th>
                                        <th>
                                            Habit.
                                        </th>
                                        <th>
                                            Piletas
                                        </th>
                                        <th>
                                            Valor Alq.
                                        </th>
                                        <th>
                                            Tipo
                                        </th>
                                        <th>
                                            Fotos
                                        </th>
                                        <th>
                                            Editar
                                        </th>
                                    </tr>
                                </thead>

                                <tbody ng-repeat="x in propiedades| filter:buscar">
                                    <tr>
                                        <td>
                                            {{x.idpropiedad}} 
                                        </td>
                                        <td>
                                            {{x.superficie}} 
                                        </td>
                                        <td>
                                            {{x.direccion}} 
                                        </td>
                                        <td>
                                            {{x.valor}}
                                        </td>
                                        <td>
                                            {{x.Descripcion}} 
                                        </td>
                                        <td>
                                            {{x.banos}} 
                                        </td>
                                        <td>
                                            {{x.habitaciones}} 
                                        </td>
                                        <td>
                                            {{x.pileta}} 
                                        </td>
                                        <td>
                                            {{x.monto}} 
                                        </td>
                                        <td>
                                            <span ng-if="myVar(x.tipopropiedad_id_tipoPropiedad)">{{ca}}</span>
                                        </td>
                                        <td>
                                            <button class="btn"  ng-click="fotos(x.idpropiedad)" >
                                                <span class="glyphicon glyphicon-picture">Fotos</span>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn"   ng-click="editar(x.idpropiedad)">
                                                <span class="glyphicon glyphicon-pencil">Editar</span>
                                            </button>  
                                        </td>
                                        <td>

                                            <a class="btn" data-toggle="modal" data-target="#DetaAlquile"
                                               data-idpropiedad="{{x.idpropiedad}}"
                                               data-descripcion="{{x.Descripcion}}"
                                               data-superficie="{{x.superficie}}"
                                               data-direccion="{{x.direccion}}"
                                               data-monto="{{x.valor}}"
                                               data-estado="{{x.estado}}">
                                                <span class="glyphicon glyphicon-ok">{{x.estado}}</span>
                                            </a>  

                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row" ng-show="registros" >

                        <div class="row">
                            <h3 ng-show="nuevo">Nueva Propiedad:</h3> 
                            <h3 ng-hide="nuevo">Edit Propiedad:</h3>
                            <form  method="post" action=""   class="form-horizontal" role="form" ng-submit="submitForm()">
                                <div class="form-group">  
                                    <label class="control-label col-md-2">Fecha Ingreso</label>
                                    <div class="col-md-3">
                                        <input class="form-control" placeholder="2015-10-14 11:00:00" autofocus type="datetime" id="arrival-time" ng-model="FPublicacion" required  name="FPublicacion"  autofocus/>
                                    </div>
                                </div>
                                <div class="form-group">  
                                    <label class="control-label col-md-2">Superficie</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text"  ng-model="superficie" required  name="superficie" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Dirección</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text"  ng-model="direccion" required  name="direccion" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Valor</label>
                                    <div class="col-md-2">
                                        <input class="form-control"  type="number" step="0.01" ng-model="valor" required  name="valor" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Descripción</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"  ng-model="Descripcion" required  name="Descripcion" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Baños</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number"  ng-model="banos" required  name="banos" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Habitaciones</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number"  ng-model="habitaciones" required  name="habitaciones" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Piletas</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number"  ng-model="pileta" required  name="pileta" />
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Otros</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" ng-model="otros" required  name="otros" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-2" >Tipo de Propiedad</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="tipopropiedad" 
                                                ng-model="tipopropiedad" ng-options="tipopro.idtipopropiedad as tipopro.Tipo for tipopro in Tipopropiedades "
                                                ng-change="CambioTpropiedad();" >

                                        </select>
                                    </div>
                                </div>
                                <!--//*                               ***** selección de divisiones geografías-->
                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Pais</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="pais" ng-change="CambioPais();"
                                                ng-model="pais" ng-options="papa.idpais as papa.pais for papa in paises ">


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Provincia</label>
                                    <div class="col-md-3">

                                        <select class="form-control" name="provincia" 
                                                ng-model="provincia" ng-options="pro.idprovincia as pro.provincia for pro in provincias "
                                                ng-change="CambioProvincia();" >

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Departamento</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="departamento" 
                                                ng-model="departamento" ng-options="departa.iddepartamento as departa.departamento for departa in departamentos "
                                                ng-change="CambioDepartamento();" >
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Municipio</label>
                                    <div class="col-md-3">

                                        <select class="form-control" name="municipio" 
                                                ng-model="municipio" ng-options="muni.idmunicipio as muni.municipio for muni in municipios "
                                                ng-change="CambioMunicipio();" >

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Ciudad</label>
                                    <div class="col-md-3">

                                        <select class="form-control" name="ciudad" 
                                                ng-model="ciudad" ng-options="ciu.idciudad as ciu.ciudad  for ciu in ciudades "
                                                ng-change="CambioCiudad();" >

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Barrios</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="barrio" 
                                                ng-model="barrio" ng-options="barr.idbarrio as barr.barrio for barr in barrios "
                                                ng-change="" >

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"  >
                                    <label class="control-label col-md-2">Coordenadas</label>
                                    <div class="col-md-4">
                                        <input id="Localizacion" class="form-control" type="text"  ng-model="localizacion" required  name="localizacion" />
                                    </div>

                                </div>
                                <div class="form-group"  >
                                    <div class="col-md-offset-2 col-md-8 bg-success">

                                    </div>
                                </div>


                                <div class="form-group "> 
                                    <div class="col-md-offset-2 col-md-10 ">
                                        <div class="col-md-5" ng-show="BotonCan">    
                                            <button class="btn"   ng-click="cancelar()">
                                                <span class="glyphicon glyphicon glyphicon-off">Cancelar</span>
                                            </button>  
                                        </div>
                                        <div class="col-md-5" ng-show="BotonAgregar">
                                            <button  type="submit"  value="Agregar"  name="Agregar" class="btn"  >
                                                <span class="glyphicon glyphicon glyphicon-ok">Agregar</span>
                                            </button>  
                                        </div>
                                        <div class="col-md-5" ng-show="BotonModificar">
                                            <button  type="submit"  value="Modificar"  name="Modificar" class="btn"   ng-click="Modificar()">
                                                <span class="glyphicon glyphicon glyphicon-ok">Modificar</span>
                                            </button>  
                                            <!--                                        //********** variables ocultas -->
                                            <input type="hidden" ng-model="idpropiedad" name="idpropiedad" ng-show="BotonModificar" value="{{idpropiedad}}" >

                                        </div>
                                    </div>
                                </div>


                            </form>


                        </div>
                    </div> 

                    <!--MApa-->
                    <!--<input type="button" name="de" value="de" id="ver" onclick="aa();" />-->


                    <!--//****     Fotos *////-->
                    <div class="row" ng-show="Listafoto" >
                        <h3>Fotos del Predio</h3>
                        <h5>Id Propiedad:{{propiedad}}</h5>
                        <div class="col-md-8 row" ng-disabled="!Listafoto">  

                            <div ng-repeat="f in Rfotos"> 
                                <div class="col-md-3">  
                                    <img  src="imagenes/Personal/fotos/propiedad/propiedad{{f.idpropiedad}}/{{f.foto}}" 
                                          data-toggle="modal" 
                                          data-target="#mama"
                                          data-whatever="imagenes/Personal/fotos/propiedad/propiedad{{f.idpropiedad}}/{{f.foto}}"
                                          data-idpropiedad="{{f.idpropiedad}}"
                                          data-foto="{{f.foto}}"
                                          class="tirafoto thumbnail" alt="{{f.foto}}">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 bg-success">

                            <h4>Subir Fotos</h4>
                            <form   id="uploadimage" method="post" action=""  ENCTYPE="multipart/form-data" class="form-horizontal" role="form" ng-show="Nuevo">                                
                                <div class="form-group">
                                    <div id="image_preview">
                                        <img id="previewing"  src="imagenes/Personal/fotos/avatar/noimage.png" class="img-thumbnail" />
                                    </div>
                                </div>
                                <hr id="line">
                                <input type="hidden" value="{{propiedad}}" name="idpropiedad"  />
                                <div class="form-group">
                                    <input type="file" class="btn btn-primary " required  type="button" name="file" id="file" />                               
                                </div>   
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="cancelar" name="cancelar"> Cancelar</button>
                                    <input type="submit" value="Upload" class="btn btn-success" />
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--************************************ Modal Foto *************************************-->

                    <div class="modal fade " id="mama" tabindex="-2" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content col-md-12">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <img  src="" id="venta" 
                                          class="modalfoto" alt=""  >
                                    <span ></span>
                                </div>
                                <button type="button"  id="borrar" class="glyphicon glyphicon-remove">Borrar</button>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="map" style="width: 100%; height: 300px;" ></div>

                    <!--************************************Detalle de alquiler ********************************-->
                    <link rel="stylesheet" type="text/css"
                          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />

                    <div class="modal fade " id="DetaAlquile" tabindex="-1"  role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Modal title</h4>

                                </div>

                                <div class="modal-body">
                                 
                                </div>
                                <div class="modal-footer"></div>

                            </div>
                        </div>
                    </div>
                    <style>
                        .ui-autocomplete {
                            z-index: 5000;

                        }    

                        #suggesstion-box ul{
                            position:relative;
                        }
                        #suggesstion-box li:hover {
                            color: #286090;
                            cursor:pointer;
                        }
                        #suggesstion-box ul  {
                            position:absolute;
                            top:100%;
                            z-index:10;
                            list-style: none;
                            padding-right: 10px;
                            border:solid 1px #6a87ab;
                            -moz-border-radius-topleft: 8px;
                            -moz-border-radius-topright:8px;
                            -moz-border-radius-bottomleft:8px;
                            -moz-border-radius-bottomright:8px;
                            -webkit-border-top-left-radius:8px;
                            -webkit-border-top-right-radius:8px;
                            -webkit-border-bottom-left-radius:8px;
                            -webkit-border-bottom-right-radius:8px;
                            border-top-left-radius:8px;
                            border-top-right-radius:8px;
                            border-bottom-left-radius:8px;
                            border-bottom-right-radius:8px;
                            background-color: rgba(10, 128, 255, 0.2);
                            background: rgba(10, 128, 255, 0.8);

                        }
                    </style>    




                    //*********************** Atención ********************************************************
                    <div id="subscription-confirm" class="modal fade" >
                        <div class="modal-dialog">   
                            <div class="modal-content"> 
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class=" info">Atención</h3>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button  id="guardar" class="btn btn-success">Guardar</button>
                                    <button  data-dismiss="modal" class="btn">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--************************************Detalle de alquiler ********************************-->

                    <div class="modal fade " id="dialogo" tabindex="-2" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content ">
                                <div class="modal-header">

                                    <h4 class="modal-title info">Dialogo</h4>
                                </div>
                                <div class="modal-body">

                                    <span></span>

                                </div>

                                <div class="modal-footer">
                                    <button type="button"  id="borrar" class="btn btn-primary">Acepta</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancela</button>

                                </div>
                            </div>
                        </div>
                    </div>












                </div> 

                <?php
//
                if (isset($_POST["Agregar"])) {
                    $FPublicacion = $_POST["FPublicacion"];
                    $superficie = utf8_decode($_POST["superficie"]);
                    $direccion = utf8_decode($_POST["direccion"]);
                    $valor = $_POST["valor"];
                    $descripcion = $_POST["Descripcion"];
                    $banos = $_POST["banos"];
                    $habitaciones = $_POST["habitaciones"];
                    $pileta = $_POST["pileta"];
                    $otros = $_POST["otros"];
                    $tipopropiedad = after(':', $_POST["tipopropiedad"]);
                    $id_pais = after(':', $_POST["pais"]);
                    $id_provincia = after(':', $_POST["provincia"]);
                    $id_departamento = after(':', $_POST["departamento"]);
                    $id_municipio = after(':', $_POST["municipio"]);
                    $id_ciudad = after(':', $_POST["ciudad"]);
                    $id_barrio = after(':', $_POST["barrio"]);
                    $localizacion = $_POST["localizacion"];

                    /*                     * *         nueva persona */
                    if ((isset($_POST["Agregar"])) && ($_POST['Agregar'] == "Agregar")) {
                        $NuevoProp = new MySQL();
                        $sql = "INSERT INTO `propiedades`( `FPublicacion`, `superficie`, `direccion`, `valor`,"
                                . "`Descripcion`, `banos`, `habitaciones`, `pileta`, `otros`, `tipopropiedad_id_tipoPropiedad`"
                                . ", `idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`, `localizacion`)"
                                . "VALUES ('$FPublicacion',$superficie, '$direccion', $valor,"
                                . "'$descripcion', $banos, $habitaciones, '$pileta', '$otros', $tipopropiedad"
                                . ", '$id_barrio', '$id_ciudad', '$id_municipio', '$id_departamento', '$id_provincia', '$id_pais'"
                                . ",'$localizacion')";
//                            echo $sql . "<br>" . $FPublicacion . "<br>";
                        $insertar = $NuevoProp->consulta($sql);
                    }
                }

                if (isset($_POST["Modificar"])) {
                    $FPublicacion = $_POST["FPublicacion"];
                    $superficie = utf8_decode($_POST["superficie"]);
                    $direccion = utf8_decode($_POST["direccion"]);
                    $valor = $_POST["valor"];
                    $descripcion = $_POST["Descripcion"];
                    $banos = $_POST["banos"];
                    $habitaciones = $_POST["habitaciones"];
                    $pileta = $_POST["pileta"];
                    $otros = $_POST["otros"];
                    $tipopropiedad = after(':', $_POST["tipopropiedad"]);
                    $id_pais = after(':', $_POST["pais"]);
                    $id_provincia = after(':', $_POST["provincia"]);
                    $id_departamento = after(':', $_POST["departamento"]);
                    $id_municipio = after(':', $_POST["municipio"]);
                    $id_ciudad = after(':', $_POST["ciudad"]);
                    $id_barrio = after(':', $_POST["barrio"]);
                    $localizacion = $_POST["localizacion"];

                    $idpropiedad = $_POST['idpropiedad'];
                    $ModiProp = new MySQL();
                    $sql = "update  `propiedades` set `FPublicacion`='$FPublicacion', `superficie`=$superficie, `direccion`='$direccion', `valor`=$valor,"
                            . "`Descripcion`='$descripcion', `banos`=$banos, `habitaciones`=$habitaciones, `pileta`='$pileta', `otros`='$otros', `tipopropiedad_id_tipoPropiedad`=$tipopropiedad"
                            . ", `idbarrio`='$id_barrio', `idciudad`='$id_ciudad', `idmunicipio`='$id_municipio', `iddepartamento`='$id_departamento', `idprovincia`='$id_provincia'"
                            . ", `idpais`='$id_pais', `localizacion`='$localizacion' where idpropiedad=$idpropiedad";

//                        echo $sql . "<br>" . $idpropiedad . "<br>";
                    $insertar = $ModiProp->consulta($sql);
                }

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
            <div id="dialog">Se a borrado</div>
        </body>
        <script src="js/propiedades.js" type="text/javascript"></script>
        <script src="js/modalfotos.js" type="text/javascript"></script>
        <script src="script.js" type="text/javascript"></script>


    </html>
