<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include 'controles/funciones.php';
        include'controles/cabezera.php';
        include'controles/cookies.php';
        ?>

        

        <script src="js/agentes.js" ></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
  
    </head>
    <body ng-app="myApp" ng-controller="customersCtrl">
        <header>
            <?php navegador(); ?>
        </header>
        <h3 class="text-center"> Registros de Analistas de Cuentas </h3> 
        <div class="container-fluid" 
             ng-init="userInit('<?php echo $_SESSION['Nombre'] . "', '" . $_SESSION['perfil'] ?>')" >
            <div class="container ">
                <div class="row">
                    <button class="btn btn-default" type="submit" name="Lista" ng-model="Lista" ng-click="Estado('Listado');"/>Lista</button>

                </div>

                <div class="row">
                    <div class="col-sm-12" >
                        <h3 ng-show="Nuevo">Nuevo Usuarios:</h3>
                        <h3 ng-show="!Listado">Edit Usuarios:</h3>
                        
                        <!--Formulario de Subida de Fotos**********************************************-->
                        <div class="col-sm-5 col-md-offset-2 bg-success " ng-show="formfoto">
                           
                          <form id="uploadimage" action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" >
                              <h3 style="text-align: center;">Avatar</h3>  
                               <div class="form-group "> 
                                 <label class="control-label col-sm-2">Usuario:{{usuario}}</label>
                               </div>
                                 <div class="form-group">
                                  <div id="image_preview">
                                      <img  id="previewing" src="imagenes/Personal/fotos/avatar/{{archivo}}" class="img-thumbnail" />
                                  </div>
                                </div>
                            <hr id="line">
                           <div class="form-group">
                                <label>Seleccionar su Imagen</label><br/>
                                <input type="file" name="file" class="btn-primary" id="file" required />
                           </div>
                            <div class="form-group">
                                <input type="hidden" name="idpersona" value="{{idpersonas}}" />
                                <button type="button" class="btn btn-primary" id="cancelar" name="cancelar"> Cancelar</button>
                                 <input type="submit" value="Upload" class="btn btn-success" />
                            </div>
                             </form>       

                            <h4 id='loading' >loading..</h4>
                            <div id="message"></div>
                        </div>     

                        <!--********************************************************************************************************************-->
                        <form  method="post" action=""  ENCTYPE="multipart/form-data" class="form-horizontal" role="form" ng-show="Nuevo">
                            <div class="form-group"> 
                                <div class="col-sm-2 col-md-offset-2">
                                    <img  src="imagenes/Personal/fotos/avatar/{{archivo}}" class="img-thumbnail" />
                                </div>
                            </div>

                            <div class="form-group">  
                                <label class="control-label col-md-2">Usuario</label>
                                <div class="col-sm-2">
                                    <input class="form-control " type="text"  ng-model="usuario" required  name="usuario"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">  
                                <label class="control-label col-sm-2">Documento</label>
                                <div class="col-sm-2">
                                    <input class="form-control " type="text"  ng-model="documento" required  name="documento" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >Nombre</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text"  ng-model="nombre" required  name="nombre" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >Apellido</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="text" ng-model="apellido" required  name="apellido" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >Nacimiento</label>
                                <div class="col-sm-3">
                                    <input  class="form-control" type="date"  required  name="nacimiento" ng-value="nacimiento" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >Dirección</label>
                                <div class="col-sm-6">
                                    <input  class="form-control" type="text" ng-model="direccion" required  name="direccion" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >teléfono</label>
                                <div class="col-sm-3">
                                    <input class="form-control" type="tel"  ng-model="telefono" required  name="telefono" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-sm-2" >Mail</label>
                                <div class="col-sm-4">
                                    <input  class="form-control" type="email" ng-model="mail" required  name="mail" />
                                </div>
                            </div>

                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Perfil</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="perfil" id="sel1"
                                            ng-model="perfil" ng-options="per.id as per.name for per in perfiles  "
                                            ng-value="">

                                    </select>

                                </div>
                            </div>
                            <!--***** selección de divisiones geografías-->
                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Pais</label>
                                <div class="col-sm-3">
                                    <!--                select -->
                                    <select class="form-control" name="pais" 
                                            ng-model="pais" ng-options="papa.idpais as papa.pais for papa in paises "
                                            ng-change="CambioPais();" >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Provincia</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="provincia" 
                                            ng-model="provincia" ng-options="pro.idprovincia as pro.provincia for pro in provincias "
                                            ng-change="CambioProvincia();" >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Departamento</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="departamento" 
                                            ng-model="departamento" ng-options="departa.iddepartamento as departa.departamento for departa in departamentos "
                                            ng-change="CambioDepartamento();" >
                                    </select>
                                </div>
                            </div><div class="form-group"  >
                                <label class="control-label col-sm-2">Municipio</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="municipio" 
                                            ng-model="municipio" ng-options="muni.idmunicipio as muni.municipio for muni in municipios "
                                            ng-change="CambioMunicipio();" >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Ciudad</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="ciudad" 
                                            ng-model="ciudad" ng-options="ciu.idciudad as ciu.ciudad  for ciu in ciudades "
                                            ng-change="CambioCiudad();" >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"  >
                                <label class="control-label col-sm-2">Barrios</label>
                                <div class="col-sm-3">
                                    <!--                           select -->
                                    <select class="form-control" name="barrio" 
                                            ng-model="barrio" ng-options="barr.idbarrio as barr.barrio for barr in barrios "
                                            ng-change="" >
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input class="form-control"  type="hidden"   name="idpersona" value="{{idpersonas}}" />
                                    <input class="form-control"  type="hidden"  name="usuario" value="{{idusuario}}" />
                                    <input class="btn btn-default" ng-show="Editar" type="submit"  value="Agregar"   name="Agente" />
                                    <input class="btn btn-default" ng-show="!Editar" type="submit"  value="Modificar"   name="Agente" />
                                    <input class="btn btn-default" type="reset"  ng-click="cancelar()"  />
                                </div>
                            </div>
                        </form>
                        <!--                    <button class="btn"  > Cancelar </button>  -->
                    </div>
                    <div class="row" >
                        <div class="col-sm-12" ng-show="Listado">
                            <h3>Lista de Agentes:</h3>
                            <label>Filtrar por Usuarios </label>
                            <input ng-model="buscar" type="text">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>
                                            Items
                                        </th>
                                        <th>
                                            Usuarios
                                        </th>

                                        <th>
                                            Mail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="x in usuarios| filter:buscar" > 
                                        <td >
                                            {{ $index + 1}} 
                                        </td>
                                        <td >
                                            {{ x.nombre}}
                                        </td>

                                        <td >
                                            {{ x.mail}}
                                        </td>
                                        <!--, idusuario,nombre ,{{ x.id_usuario}},' {{x.nombre}}'-->
                                        <td >
                                            <button class="btn" ng-show="{{x.idpersonas}}"  ng-click="Avatar(x.idpersonas, x.id_usuario, x.nombre)">
                                                <span class="glyphicon glyphicon-user"></span>
                                                Avatar
                                            </button>
                                        </td >  
                                        <td >
                                            <button class="btn"   ng-click="editUser(x.id - 1, x.idpersonas, x.id_usuario)">
                                                <span class="glyphicon glyphicon-pencil"></span>{{x.id_usuario}}-{{x.idpersonas}}
                                                Editar
                                            </button>
                                        </td>

                                    </tr>  
                                </tbody>
                            </table>

                        </div>
                    </div>  


                </div>
            </div>
            <?php
            if ((isset($_POST['submit'])) and ( $_POST['submit'] == 'upload')) {

                upload();
            }


            if (isset($_POST["Agente"])) {
                $idpersonas = $_POST["idpersona"];
                echo $idpersonas;
                $idusuario = $_POST["usuario"];
                $documento = $_POST["documento"];
                $nombre = utf8_decode($_POST["nombre"]);
                $apellido = utf8_decode($_POST["apellido"]);
                $nacimiento = $_POST["nacimiento"];
                $mail = $_POST["mail"];
                $direccion = $_POST["direccion"];
                $telefono = $_POST["telefono"];
                $perfil = $_POST["perfil"];
                $id_pais = after(':', $_POST["pais"]);
                $id_provincia = after(':', $_POST["provincia"]);
                $id_departamento = after(':', $_POST["departamento"]);
                $id_municipio = after(':', $_POST["municipio"]);
                $id_ciudad = after(':', $_POST["ciudad"]);
                $id_barrio = after(':', $_POST["barrio"]);
                $perfil = after(':', $_POST["perfil"]);

                /*                 * *         nueva persona */
                if ((isset($_POST["Agente"])) && ($_POST['Agente'] == "Agregar")) {
                    $NuevaPers = new MySQL();
                    $sql = "insert into personas (`nombre`, `apellido`, `nacimiento`, `mail`, `telefono`, `direccion`, `documento`,"
                            . "`idbarrio`, `idciudad`,`idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`)"
                            . " values ('$nombre','$apellido','$nacimiento','$mail','$telefono','$direccion',"
                            . "'$documento',$id_barrio, $id_ciudad, $id_municipio, $id_departamento, $id_provincia"
                            . ", $id_pais)"
                    ;

//                         echo $sql."<br>".$perfil;

                    $insertar = $NuevaPers->consulta($sql);

                    $ultimoid = new MySQL();
                    $cade = "SELECT MAX(idpersonas) AS id FROM personas";
                    $veri = $ultimoid->consulta($cade);
                    while ($rs = mysql_fetch_array($veri)) {
                        $id = $rs["id"];
                    }
                    $AgregarPersonasusuarios = new MySQL();
                    $NPU = "insert into `personas usuario` (idpersonas,idusuario) values ($id,$idusuario)";
                    $AgregarPEr = $AgregarPersonasusuarios->consulta($NPU);

                    $ActPerfil = new MySQL();
                    $sql = "update usuario set id_perfil=$perfil , mail='$mail' where id_usuario=$idusuario";
                    $Actp = $ActPerfil->consulta($sql);
//                    echo $sql."<br>perfil".$perfil."usuario=$idusuario";
                } elseif ((isset($_POST["Agente"])) && ($_POST['Agente'] == "Modificar")) {
                    /*                     * *       Actualizar la persona */

                    $ActualiPersona = new MySQL();
                    $sql = "update personas set documento =$documento, nombre='$nombre',apellido='$apellido', "
                            . "nacimiento='$nacimiento',mail='$mail',direccion='$direccion',"
                            . " telefono='$telefono', idbarrio=$id_barrio , idciudad=$id_ciudad,"
                            . " idmunicipio=$id_municipio, iddepartamento=$id_departamento, "
                            . "idprovincia=$id_provincia , idpais=$id_pais"
                            . " where idpersonas=$idpersonas";
                    echo $sql . "<br>" . $perfil;
                    $Actualizar = $ActualiPersona->consulta($sql);
                    $ActPerfil = new MySQL();
                    $sql = "update usuario set id_perfil=$perfil , mail='$mail' where id_usuario=$idusuario";
                    $Actp = $ActPerfil->consulta($sql);
//                    echo $sql."<br>perfil".$perfil."usuario=$idusuario";
                }
            }
            ?>
                  <script src="script.js" type="text/javascript"></script>
    </body>
</html>
