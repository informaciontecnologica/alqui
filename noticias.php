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

        <script src="jquery/angular.min.js" type="text/javascript"></script>

    
        <link href="style.css" rel="stylesheet" type="text/css"/>
       
    </head>
    <body ng-app="myApp" ng-controller="customersCtrl">
        <header>
            <?php navegador(); ?>
        </header>
        <h3 class="text-center"> Registros Noticias</h3> 
        <div class="container-fluid" 
             ng-init="userInit('<?php echo $_SESSION['Nombre'] . "', '" . $_SESSION['perfil'] ?>')" >
            <div class="container ">
                <div class="row">
                    <button class="btn btn-default" type="submit" name="Lista" ng-model="Lista" ng-click="Estado('Listado');"/>Lista</button>

                </div>

                <div class="row">
                    <div class="col-sm-12" >
                        <h3 ng-show="Nuevo">Nuevas noticias:</h3>
                        <h3 ng-show="!Listado">Editar noticias:</h3>
      


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
                    echo $sql."<br>".$perfil;
                    $Actualizar = $ActualiPersona->consulta($sql);
                    $ActPerfil = new MySQL();
                    $sql = "update usuario set id_perfil=$perfil , mail='$mail' where id_usuario=$idusuario";
                    $Actp = $ActPerfil->consulta($sql);
//                    echo $sql."<br>perfil".$perfil."usuario=$idusuario";
                }
            }
            ?>



    </body>
</html>
