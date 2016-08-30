<?php
include 'coneccion/conecionMYSQL.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['idpropiedad'])) {
$idpropiedad= strip_tags($_POST['idpropiedad']);   
$fecha = strip_tags($_POST['fecha']);
$precio=strip_tags($_POST['precio']);
$idlocatario=strip_tags($_POST['idlocatario']);
$idpersonas=strip_tags($_POST['idpersonas']);
print($idpropiedad. $fecha. $precio. $idpersonas);
//realizar el insert con la nueva tabla
$pa=mysql_query("INSERT INTO `personas_alquileres` (idalquileres,idpersona) values ($idalquiler,$idpersonas)");
$alqui=mysql_query("update  alquileres set monto=$precio , fecha_Activa=$fecha, estado='alquilado' where idalquiler=$idalquiler") ;


}